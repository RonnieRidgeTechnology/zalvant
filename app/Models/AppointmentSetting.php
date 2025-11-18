<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentSetting extends Model
{
      protected $fillable = [
        'day',
        'status',
    ];
}
