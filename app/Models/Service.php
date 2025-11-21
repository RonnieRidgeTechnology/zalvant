<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_description',
        'hero_image',
        'name',
        'description',
        'icon',
        'slug',
        'title1',
        'description1',
        'order_by',
        'image1',
        'title2',
        'description2',
        'image2',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'hover_icon',
        'type',
        'landing_type_id',
        'portfolio_title',
        'portfolio_description',
        'status',
        // Multilingual fields
        'hero_title_en', 'hero_title_fr', 'hero_title_de',
        'hero_description_en', 'hero_description_fr', 'hero_description_de',
        'name_en', 'name_fr', 'name_de',
        'description_en', 'description_fr', 'description_de',
        'title1_en', 'title1_fr', 'title1_de',
        'description1_en', 'description1_fr', 'description1_de',
        'title2_en', 'title2_fr', 'title2_de',
        'description2_en', 'description2_fr', 'description2_de',
        'portfolio_title_en', 'portfolio_title_fr', 'portfolio_title_de',
        'portfolio_description_en', 'portfolio_description_fr', 'portfolio_description_de',
        'meta_title_en', 'meta_title_fr', 'meta_title_de',
        'meta_description_en', 'meta_description_fr', 'meta_description_de',
        'meta_keywords_en', 'meta_keywords_fr', 'meta_keywords_de',
    ];
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class, 'portfolioservices');
    }
    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'service_technologies', 'service_id', 'technology_id');
    }
    public function serviceTechnologies()
    {
        return $this->hasMany(ServiceTechnology::class);
    }
    public function servicePortfolios()
    {
        return $this->hasMany(PortfolioTechnology::class, 'portfolio_id', 'id');
    }
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_service', 'service_id', 'appointment_id');
    }
    
    public function landingType()
    {
        return $this->belongsTo(LandingType::class, 'landing_type_id');
    }

    /**
     * Get localized field value
     */
    private function getLocalizedField($field, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $localizedField = $locale === 'nl' ? $field : "{$field}_{$locale}";
        return $this->$localizedField ?? $this->$field; // Fallback to Dutch
    }

    // Localized getters
    public function getLocalizedHeroTitle($locale = null) { return $this->getLocalizedField('hero_title', $locale); }
    public function getLocalizedHeroDescription($locale = null) { return $this->getLocalizedField('hero_description', $locale); }
    public function getLocalizedName($locale = null) { return $this->getLocalizedField('name', $locale); }
    public function getLocalizedDescription($locale = null) { return $this->getLocalizedField('description', $locale); }
    public function getLocalizedTitle1($locale = null) { return $this->getLocalizedField('title1', $locale); }
    public function getLocalizedDescription1($locale = null) { return $this->getLocalizedField('description1', $locale); }
    public function getLocalizedTitle2($locale = null) { return $this->getLocalizedField('title2', $locale); }
    public function getLocalizedDescription2($locale = null) { return $this->getLocalizedField('description2', $locale); }
    public function getLocalizedPortfolioTitle($locale = null) { return $this->getLocalizedField('portfolio_title', $locale); }
    public function getLocalizedPortfolioDescription($locale = null) { return $this->getLocalizedField('portfolio_description', $locale); }
    public function getLocalizedMetaTitle($locale = null) { return $this->getLocalizedField('meta_title', $locale); }
    public function getLocalizedMetaDescription($locale = null) { return $this->getLocalizedField('meta_description', $locale); }
    public function getLocalizedMetaKeywords($locale = null) { return $this->getLocalizedField('meta_keywords', $locale); }

}
