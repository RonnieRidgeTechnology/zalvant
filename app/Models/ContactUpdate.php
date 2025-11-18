<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUpdate extends Model
{
    protected $fillable = [
        'name',
        'desc',
        'meta_title',
        'meta_description',
        'meta_keywords',
        // Multilingual fields
        'name_en', 'name_fr', 'name_de',
        'desc_en', 'desc_fr', 'desc_de',
        'meta_title_en', 'meta_title_fr', 'meta_title_de',
        'meta_description_en', 'meta_description_fr', 'meta_description_de',
        'meta_keywords_en', 'meta_keywords_fr', 'meta_keywords_de',
    ];

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
    public function getLocalizedName($locale = null) { return $this->getLocalizedField('name', $locale); }
    public function getLocalizedDesc($locale = null) { return $this->getLocalizedField('desc', $locale); }
    public function getLocalizedMetaTitle($locale = null) { return $this->getLocalizedField('meta_title', $locale); }
    public function getLocalizedMetaDescription($locale = null) { return $this->getLocalizedField('meta_description', $locale); }
    public function getLocalizedMetaKeywords($locale = null) { return $this->getLocalizedField('meta_keywords', $locale); }
}
