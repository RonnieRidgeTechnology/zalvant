<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $fillable = [
        'type',
        'slug',
        // Section 1
        'header_title',
        'header_title_en',
        'header_title_fr',
        'header_title_de',
        'header_desc',
        'header_desc_en',
        'header_desc_fr',
        'header_desc_de',

        // Section 2
        'second_title',
        'second_title_en',
        'second_title_fr',
        'second_title_de',
        'second_desc',
        'second_desc_en',
        'second_desc_fr',
        'second_desc_de',

        // Media
        'file',

        // Section 3
        'third_title',
        'third_title_en',
        'third_title_fr',
        'third_title_de',
        'third_desc',
        'third_desc_en',
        'third_desc_fr',
        'third_desc_de',

        // Feature blocks
        'feature_blocks',
    ];

    protected $casts = [
        'feature_blocks' => 'array',
    ];

    /**
     * Fetch a localized value with Dutch as fallback.
     */
    public function getLocalized(string $field, ?string $locale = null): ?string
    {
        $locale = $locale ?? app()->getLocale();
        $localizedField = $locale === 'nl' ? $field : "{$field}_{$locale}";

        return $this->{$localizedField} ?? $this->{$field};
    }

    /**
     * Convenience accessor for localized feature collection.
     */
    public function getLocalizedFeatures(?string $locale = null): array
    {
        $locale = $locale ?? app()->getLocale();
        $features = $this->feature_blocks ?? [];

        return collect($features)->map(function ($feature) use ($locale) {
            return [
                'icon' => $feature['icon'] ?? null,
                'title' => data_get($feature, "title.{$locale}") ?? data_get($feature, 'title.nl'),
                'desc' => data_get($feature, "desc.{$locale}") ?? data_get($feature, 'desc.nl'),
            ];
        })->toArray();
    }

    /**
     * Many-to-many relationship with services
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'landing_page_service', 'landing_page_id', 'service_id');
    }
}

