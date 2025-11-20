<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandingType extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'name_fr',
        'name_de',
        'order',
        'status',
        'slug',
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function (LandingType $type) {
            if (empty($type->slug)) {
                $type->slug = static::generateUniqueSlug($type->name);
            }
        });

        static::updating(function (LandingType $type) {
            if (empty($type->slug)) {
                $type->slug = static::generateUniqueSlug($type->name, $type->id);
            }
        });
    }

    private static function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }
}

