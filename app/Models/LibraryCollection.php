<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryCollection extends Model
{
    protected $fillable = [
        "name",
        "slug"
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
