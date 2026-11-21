<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Database\Seeders\EkrafUserSeeder;
use Database\Seeders\MerchandiseCatalogSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MerchandiseTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_catalog_only_displays_active_products(): void
    {
        Product::create([
            'name' => 'Kaos HIMAMO',
            'slug' => 'kaos-himamo',
            'price' => 85000,
            'stock' => 4,
            'is_active' => true,
        ]);
        Product::create([
            'name' => 'Produk Draft',
            'slug' => 'produk-draft',
            'price' => 50000,
            'stock' => 2,
            'is_active' => false,
        ]);

        $this->get(route('merchandise.index'))
            ->assertOk()
            ->assertSee('Kaos HIMAMO')
            ->assertDontSee('Produk Draft');
    }

    public function test_ekraf_can_manage_products_with_variant_inventory_and_uploaded_images(): void
    {
        Storage::fake('public');
        $ekraf = User::factory()->create(['role' => 'ekraf']);

        $response = $this->actingAs($ekraf)->post(route('ekraf.produk.store'), [
            'name' => 'Jaket HIMAMO',
            'sku' => 'HM-JKT-01',
            'category' => 'Apparel',
            'description' => 'Jaket organisasi.',
            'price' => 275000,
            'is_active' => '1',
            'image' => UploadedFile::fake()->image('jaket.png'),
            'variants' => [
                ['name' => 'Ukuran M / Hitam', 'stock' => 3],
                ['name' => 'Ukuran L / Hitam', 'stock' => 2],
            ],
        ]);

        $response->assertRedirect(route('ekraf.produk.index'));
        $this->assertDatabaseHas('products', [
            'name' => 'Jaket HIMAMO',
            'sku' => 'HM-JKT-01',
            'price' => 275000,
            'stock' => null,
        ]);
        $this->assertDatabaseHas('product_variants', ['name' => 'Ukuran M / Hitam', 'stock' => 3]);
        $this->assertDatabaseHas('product_variants', ['name' => 'Ukuran L / Hitam', 'stock' => 2]);

        $product = Product::where('sku', 'HM-JKT-01')->with('variants')->firstOrFail();
        $this->assertSame(5, $product->available_stock);
        Storage::disk('public')->assertExists($product->image_path);
    }

    public function test_ekraf_can_open_product_forms(): void
    {
        $ekraf = User::factory()->create(['role' => 'ekraf']);
        $product = Product::create([
            'name' => 'Kaos',
            'slug' => 'kaos',
            'price' => 75000,
            'stock' => 5,
            'is_active' => true,
        ]);

        $this->actingAs($ekraf)
            ->get(route('ekraf.produk.create'))
            ->assertOk()
            ->assertSee('Tambah Produk');

        $this->get(route('ekraf.produk.edit', $product))
            ->assertOk()
            ->assertSee('Kaos');
    }

    public function test_product_update_replaces_variant_stock_and_product_details(): void
    {
        $product = Product::create([
            'name' => 'Kaos Lama',
            'slug' => 'kaos-lama',
            'price' => 70000,
            'stock' => null,
            'is_active' => true,
        ]);
        $oldVariant = $product->variants()->create(['name' => 'Ukuran S', 'stock' => 4]);
        $ekraf = User::factory()->create(['role' => 'ekraf']);

        $this->actingAs($ekraf)->put(route('ekraf.produk.update', $product), [
            'name' => 'Kaos Baru',
            'sku' => 'HM-KAOS-02',
            'price' => 80000,
            'is_active' => '1',
            'variants' => [
                ['name' => 'Ukuran M', 'stock' => 7],
            ],
        ])->assertRedirect(route('ekraf.produk.index'));

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Kaos Baru',
            'slug' => 'kaos-baru',
            'price' => 80000,
            'stock' => null,
        ]);
        $this->assertDatabaseMissing('product_variants', ['id' => $oldVariant->id]);
        $this->assertDatabaseHas('product_variants', [
            'product_id' => $product->id,
            'name' => 'Ukuran M',
            'stock' => 7,
        ]);
    }

    public function test_product_validation_rejects_negative_price_and_stock(): void
    {
        $ekraf = User::factory()->create(['role' => 'ekraf']);

        $this->actingAs($ekraf)->post(route('ekraf.produk.store'), [
            'name' => 'Produk Invalid',
            'price' => -1,
            'stock' => -2,
            'is_active' => '1',
        ])->assertSessionHasErrors(['price', 'stock']);

        $this->assertDatabaseMissing('products', ['name' => 'Produk Invalid']);
    }

    public function test_product_management_is_limited_to_admin_and_ekraf(): void
    {
        $this->get(route('ekraf.produk.index'))->assertRedirect('/login');

        $member = User::factory()->create(['role' => 'member']);
        $this->actingAs($member)
            ->get(route('ekraf.produk.index'))
            ->assertForbidden();

        $staff = User::factory()->create(['role' => 'staff']);
        $this->actingAs($staff)
            ->get(route('ekraf.produk.index'))
            ->assertForbidden();

        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin)
            ->get(route('ekraf.produk.index'))
            ->assertOk();
    }

    public function test_ekraf_cannot_access_general_dashboard_or_user_administration(): void
    {
        $ekraf = User::factory()->create(['role' => 'ekraf']);

        $this->actingAs($ekraf)->get(route('dashboard'))->assertForbidden();
        $this->actingAs($ekraf)->get(route('user.index'))->assertForbidden();
        $this->actingAs($ekraf)->get(route('ae-leader.index'))->assertForbidden();
    }

    public function test_admin_can_assign_ekraf_role_to_a_user(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create(['role' => 'staff']);

        $this->actingAs($admin)->put(route('user.update', $user), [
            'username' => $user->username,
            'name' => $user->name,
            'email' => $user->email,
            'password' => '',
            'password_confirmation' => '',
            'role' => 'ekraf',
        ])->assertRedirect(route('user.index'));

        $this->assertDatabaseHas('users', ['id' => $user->id, 'role' => 'ekraf']);
    }

    public function test_public_registration_creates_member_and_ignores_requested_role(): void
    {
        $this->get(route('register'))->assertOk();

        $this->post(route('register'), [
            'name' => 'Pengguna Baru',
            'email' => 'member@example.test',
            'password' => 'Password-12345',
            'password_confirmation' => 'Password-12345',
            'username' => 'attempted-admin',
            'role' => 'admin',
        ])->assertRedirect(route('merchandise.index'));

        $this->assertDatabaseHas('users', [
            'email' => 'member@example.test',
            'role' => 'member',
        ]);
        $this->assertNotSame('attempted-admin', User::where('email', 'member@example.test')->value('username'));
        $this->assertAuthenticated();
    }

    public function test_ekraf_seeder_assigns_role_without_changing_other_user_data(): void
    {
        $user = User::factory()->create([
            'email' => 'ekraf@himamo.com',
            'role' => 'staff',
        ]);

        $this->seed(EkrafUserSeeder::class);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'ekraf@himamo.com',
            'role' => 'ekraf',
        ]);
    }

    public function test_merchandise_catalog_seeder_creates_demo_products_and_is_safe_to_rerun(): void
    {
        $this->seed(MerchandiseCatalogSeeder::class);
        $this->seed(MerchandiseCatalogSeeder::class);

        $this->assertDatabaseCount('products', 8);
        $this->assertDatabaseCount('product_variants', 4);
        $this->assertDatabaseHas('products', [
            'slug' => 'stiker-warning-automation-engineering',
            'image_path' => 'assets/katalog_assets/stiker1.jpeg',
            'is_active' => true,
        ]);
        $this->assertDatabaseHas('product_variants', [
            'name' => 'Ukuran S/M',
            'stock' => 20,
        ]);

        $product = Product::where('slug', 'stiker-warning-automation-engineering')->firstOrFail();
        $this->assertSame(
            asset('assets/katalog_assets/stiker1.jpeg'),
            $product->image_url,
        );

        $this->get(route('merchandise.index'))
            ->assertOk()
            ->assertSee($product->name)
            ->assertSee($product->image_url);
    }

    public function test_deleting_a_product_from_the_panel_only_deactivates_it(): void
    {
        $product = Product::create([
            'name' => 'Lanyard',
            'slug' => 'lanyard',
            'price' => 25000,
            'stock' => 8,
            'is_active' => true,
        ]);
        $ekraf = User::factory()->create(['role' => 'ekraf']);

        $this->actingAs($ekraf)
            ->delete(route('ekraf.produk.destroy', $product))
            ->assertRedirect(route('ekraf.produk.index'));

        $this->assertDatabaseHas('products', ['id' => $product->id, 'is_active' => false]);
    }
}
