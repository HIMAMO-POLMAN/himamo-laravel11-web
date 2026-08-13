<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    protected $fillable = [
        'name',
        'nim',
        'position',
        'period_start',
        'period_end',
        'image',
        'linkedin',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // path default kalau image kosong
    const DEFAULT_IMAGE = 'assets-guest/img/img-leader-pria.webp';

    // accessor: $leader->image_url
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        return asset(self::DEFAULT_IMAGE);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
