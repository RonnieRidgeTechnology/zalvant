<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioUpdate extends Model
{
       protected $fillable = [
        'main_title',
        'main_desc',
        'section1_title',
        'section1_desc',
        'meta_title',
        'meta_desc',
        'meta_keywords',
        // English
        'main_title_en',
        'main_desc_en',
        'section1_title_en',
        'section1_desc_en',
        'meta_title_en',
        'meta_desc_en',
        'meta_keywords_en',
        // French
        'main_title_fr',
        'main_desc_fr',
        'section1_title_fr',
        'section1_desc_fr',
        'meta_title_fr',
        'meta_desc_fr',
        'meta_keywords_fr',
        // German
        'main_title_de',
        'main_desc_de',
        'section1_title_de',
        'section1_desc_de',
        'meta_title_de',
        'meta_desc_de',
        'meta_keywords_de',
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

    public function getLocalizedMainDesc()
    {
        return $this->getLocalizedField('main_desc');
    }

    public function getLocalizedSection1Title()
    {
        return $this->getLocalizedField('section1_title');
    }

    public function getLocalizedSection1Desc()
    {
        return $this->getLocalizedField('section1_desc');
    }

    public function getLocalizedMetaTitle()
    {
        return $this->getLocalizedField('meta_title');
    }

    public function getLocalizedMetaDesc()
    {
        return $this->getLocalizedField('meta_desc');
    }

    public function getLocalizedMetaKeywords()
    {
        return $this->getLocalizedField('meta_keywords');
    }
}
