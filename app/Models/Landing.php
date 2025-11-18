<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
     protected $fillable = [ 'name', 'email', 'phone', 'company', 'service_id', 'message', ];
}
