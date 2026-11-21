<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use RuntimeException;
use Throwable;

class MerchandiseProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('variants')
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->string('search')->toString();

                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%");
                });
            })
            ->when($request->input('status') === 'active', fn ($query) => $query->where('is_active', true))
            ->when($request->input('status') === 'inactive', fn ($query) => $query->where('is_active', false))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.dashboard.merchandise.index', compact('products'));
    }

    public function create()
    {
        return view('admin.dashboard.merchandise.form', [
            'product' => null,
            'isEditing' => false,
            'variantRows' => [],
        ]);
    }

    public function store(Request $request)
    {
        $request->merge(['is_active' => $request->boolean('is_active')]);
        $validated = $request->validate($this->rules());
        $variants = $validated['variants'] ?? [];
        $newImagePath = $request->file('image')?->store('merchandise', 'public');

        if ($request->hasFile('image') && ! $newImagePath) {
            throw new RuntimeException('Gambar produk gagal disimpan.');
        }

        try {
            DB::transaction(function () use ($validated, $variants, $newImagePath) {
                $product = Product::create([
                    'name' => $validated['name'],
                    'slug' => $this->uniqueSlug($validated['name']),
                    'sku' => $validated['sku'] ?? null,
                    'description' => $validated['description'] ?? null,
                    'category' => $validated['category'] ?? null,
                    'image_path' => $newImagePath,
                    'price' => $validated['price'],
                    'stock' => $variants === [] ? $validated['stock'] : null,
                    'is_active' => $validated['is_active'],
                ]);

                if ($variants !== []) {
                    $product->variants()->createMany($variants);
                }
            });
        } catch (Throwable $exception) {
            if ($newImagePath) {
                Storage::disk('public')->delete($newImagePath);
            }

            throw $exception;
        }

        return redirect()->route('ekraf.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $produk)
    {
        $produk->load('variants');

        return view('admin.dashboard.merchandise.form', [
            'product' => $produk,
            'isEditing' => true,
            'variantRows' => $produk->variants
                ->map(fn ($variant) => ['name' => $variant->name, 'stock' => $variant->stock])
                ->all(),
        ]);
    }

    public function update(Request $request, Product $produk)
    {
        $request->merge(['is_active' => $request->boolean('is_active')]);
        $validated = $request->validate($this->rules($produk));
        $variants = $validated['variants'] ?? [];
        $oldImagePath = $produk->image_path;
        $newImagePath = $request->file('image')?->store('merchandise', 'public');

        if ($request->hasFile('image') && ! $newImagePath) {
            throw new RuntimeException('Gambar produk gagal disimpan.');
        }

        try {
            DB::transaction(function () use ($produk, $validated, $variants, $newImagePath) {
                $produk->update([
                    'name' => $validated['name'],
                    'slug' => $this->uniqueSlug($validated['name'], $produk),
                    'sku' => $validated['sku'] ?? null,
                    'description' => $validated['description'] ?? null,
                    'category' => $validated['category'] ?? null,
                    'image_path' => $newImagePath ?? $produk->image_path,
                    'price' => $validated['price'],
                    'stock' => $variants === [] ? $validated['stock'] : null,
                    'is_active' => $validated['is_active'],
                ]);

                $produk->variants()->delete();

                if ($variants !== []) {
                    $produk->variants()->createMany($variants);
                }
            });
        } catch (Throwable $exception) {
            if ($newImagePath) {
                Storage::disk('public')->delete($newImagePath);
            }

            throw $exception;
        }

        if ($newImagePath && $oldImagePath) {
            Storage::disk('public')->delete($oldImagePath);
        }

        return redirect()->route('ekraf.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $produk)
    {
        $produk->update(['is_active' => false]);

        return redirect()->route('ekraf.produk.index')->with('success', 'Produk dinonaktifkan dan tetap tersimpan.');
    }

    private function rules(?Product $product = null): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'sku' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('products', 'sku')->ignore($product?->id),
            ],
            'description' => ['nullable', 'string', 'max:5000'],
            'category' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'price' => ['required', 'integer', 'min:0'],
            'stock' => ['required_without:variants', 'nullable', 'integer', 'min:0'],
            'variants' => ['nullable', 'array'],
            'variants.*.name' => ['required', 'string', 'max:120', 'distinct'],
            'variants.*.stock' => ['required', 'integer', 'min:0'],
            'is_active' => ['required', 'boolean'],
        ];
    }

    private function uniqueSlug(string $name, ?Product $except = null): string
    {
        $base = Str::slug($name) ?: 'produk';
        $slug = $base;
        $suffix = 2;

        while (
            Product::query()
                ->where('slug', $slug)
                ->when($except, fn ($query) => $query->where('id', '!=', $except->id))
                ->exists()
        ) {
            $slug = "{$base}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }
}
