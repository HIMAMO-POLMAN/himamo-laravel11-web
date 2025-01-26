<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationCategories extends Model
{
    use HasFactory;

    protected $table = 'information_categories';
    protected $fillable = [
        'name',
        'slug',
    ];

    public function informasi(){
        return $this->hasMany(Information::class, 'kategori_informasi_id');
    }
}
