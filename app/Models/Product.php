<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'description',
        'category',
        'image_path',
        'price',
        'stock',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'stock' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function getAvailableStockAttribute(): int
    {
        $variants = $this->variants;

        return $variants->isNotEmpty()
            ? (int) $variants->sum('stock')
            : (int) ($this->stock ?? 0);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image_path) {
            return null;
        }

        if (str_starts_with($this->image_path, 'assets/katalog_assets/')) {
            return asset($this->image_path);
        }

        return Storage::disk('public')->url($this->image_path);
    }
}
