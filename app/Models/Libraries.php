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
}
