<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryCollection extends Model
{
       protected $table = 'library_collections';
    protected $fillable = [
        "name",
        "slug"
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function libraries()
    {
        return $this->hasMany(Libraries::class, 'collection_id');
    }
}
