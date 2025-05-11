<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibrariesView extends Model
{
    protected $table = 'libraries_views';
    protected $fillable = ['libraries_id', 'ip_address'];

    public function libraries()
    {
        return $this->belongsTo(Libraries::class);
    }
}
