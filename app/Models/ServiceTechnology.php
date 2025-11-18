<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTechnology extends Model
{
    protected $fillable = [
        'service_id',
        'technology_id'
    ];

    public $timestamps = true;
    public function technology(){
        return $this->belongsTo(Technology::class);
    }

}
