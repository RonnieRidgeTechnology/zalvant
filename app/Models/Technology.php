<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{

    protected $fillable = [
        'name',
        'image',
    ];
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_technologies', 'technology_id', 'service_id');
    }
}
