<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformationView extends Model
{
    use HasFactory;

     protected $table = 'information_views';
    protected $fillable = ['information_id', 'ip_address'];

    public function information()
    {
        return $this->belongsTo(Information::class);
    }
}
