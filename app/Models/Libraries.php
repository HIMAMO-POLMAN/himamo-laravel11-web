<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libraries extends Model
{
    use HasFactory;

    protected $table = 'libraries';
    protected $fillable = [
        'title',
        'isbn',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'abstrak',
        'cover',
        'bahasa',
        'jumlah_halaman',
        'slug',
        'url',
        'collection',
    ];

    public function views(){
        return $this->hasMany(LibrariesView::class, 'libraries_id');
    }

    public function collections(){
        return $this->belongsTo(LibraryCollection::class,"collection");
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
