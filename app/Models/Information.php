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
        'category_id',
        'image',
        'desc',
    ];

    public function category()
    {
        return $this->belongsTo(InformationCategories::class, 'category_id');
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
