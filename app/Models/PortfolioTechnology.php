<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioTechnology extends Model
{
    protected $fillable = [
        'portfolio_id',
        'technology_id'
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }
}
