<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';
    protected $fillable = [
        'meta_title',
        'meta_keyword',
        'meta_desc',
        'main_title',
        'main_desc',
        'section1_title',
        'section1_desc',
        'section2_title',
        'section2_desc',
    ];
}
