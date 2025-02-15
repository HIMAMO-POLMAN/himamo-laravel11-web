<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'information';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'kategori_informasi_id',
        'image',
        'desc',
    ];

    public function kategori_informasi()
    {
        return $this->belongsTo(InformationCategories::class, 'kategori_informasi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function views(){
        return $this->hasMany(InformationView::class, 'information_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
