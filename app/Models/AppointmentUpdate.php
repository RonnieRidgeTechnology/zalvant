<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentUpdate extends Model
{
    protected $fillable = [
        'main_title',
        'main_desc',
        'main_title_en',
        'main_desc_en',
        'main_title_fr',
        'main_desc_fr',
        'main_title_de',
        'main_desc_de',
        'image',
        'meta_title',
        'meta_desc',
        'meta_keywords',
        'meta_title_en',
        'meta_desc_en',
        'meta_keywords_en',
        'meta_title_fr',
        'meta_desc_fr',
        'meta_keywords_fr',
        'meta_title_de',
        'meta_desc_de',
        'meta_keywords_de',
        'image_alt'
    ];

    public function getLocalizedMainTitle()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->main_title_en)) return $this->main_title_en;
        elseif ($locale === 'fr' && !empty($this->main_title_fr)) return $this->main_title_fr;
        elseif ($locale === 'de' && !empty($this->main_title_de)) return $this->main_title_de;
        return $this->main_title;
    }

    public function getLocalizedMainDesc()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->main_desc_en)) return $this->main_desc_en;
        elseif ($locale === 'fr' && !empty($this->main_desc_fr)) return $this->main_desc_fr;
        elseif ($locale === 'de' && !empty($this->main_desc_de)) return $this->main_desc_de;
        return $this->main_desc;
    }

    public function getLocalizedMetaTitle()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->meta_title_en)) return $this->meta_title_en;
        elseif ($locale === 'fr' && !empty($this->meta_title_fr)) return $this->meta_title_fr;
        elseif ($locale === 'de' && !empty($this->meta_title_de)) return $this->meta_title_de;
        return $this->meta_title;
    }

    public function getLocalizedMetaDesc()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->meta_desc_en)) return $this->meta_desc_en;
        elseif ($locale === 'fr' && !empty($this->meta_desc_fr)) return $this->meta_desc_fr;
        elseif ($locale === 'de' && !empty($this->meta_desc_de)) return $this->meta_desc_de;
        return $this->meta_desc;
    }

    public function getLocalizedMetaKeywords()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->meta_keywords_en)) return $this->meta_keywords_en;
        elseif ($locale === 'fr' && !empty($this->meta_keywords_fr)) return $this->meta_keywords_fr;
        elseif ($locale === 'de' && !empty($this->meta_keywords_de)) return $this->meta_keywords_de;
        return $this->meta_keywords;
    }
}
