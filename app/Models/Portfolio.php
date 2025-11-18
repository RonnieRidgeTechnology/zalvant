<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_description',
        'hero_image',
        'main_title',
        'main_description',
        'main_image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'slug',
        'banner_image',
        'additional_images',
        'home_page_order',
        'main_image_alt',
        'banner_image_alt',
        // English
        'main_title_en',
        'main_description_en',
        'meta_title_en',
        'meta_description_en',
        'meta_keywords_en',
        // French
        'main_title_fr',
        'main_description_fr',
        'meta_title_fr',
        'meta_description_fr',
        'meta_keywords_fr',
        // German
        'main_title_de',
        'main_description_de',
        'meta_title_de',
        'meta_description_de',
        'meta_keywords_de',
    ];

    protected $casts = [
        'additional_images' => 'array',
    ];

    /**
     * Helper method to get localized field value with fallback to Dutch
     */
    private function getLocalizedField($fieldName)
    {
        $locale = app()->getLocale();
        
        if ($locale === 'nl') {
            return $this->$fieldName;
        }
        
        $localizedField = $fieldName . '_' . $locale;
        return $this->$localizedField ?: $this->$fieldName;
    }

    // Localized getters
    public function getLocalizedMainTitle()
    {
        return $this->getLocalizedField('main_title');
    }

    public function getLocalizedMainDescription()
    {
        return $this->getLocalizedField('main_description');
    }

    public function getLocalizedMetaTitle()
    {
        return $this->getLocalizedField('meta_title');
    }

    public function getLocalizedMetaDescription()
    {
        return $this->getLocalizedField('meta_description');
    }

    public function getLocalizedMetaKeywords()
    {
        return $this->getLocalizedField('meta_keywords');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'portfolioservices', 'portfolio_id', 'service_id');
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'portfolio_technologies', 'portfolio_id', 'technology_id');
    }

    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }
    public function portfolioTechnologies()
    {
        return $this->hasMany(PortfolioTechnology::class);
    }
}
