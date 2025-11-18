<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    protected $table = 'privacy_policies';

    protected $fillable = [
        'title',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'title_en',
        'description_en',
        'meta_title_en',
        'meta_description_en',
        'meta_keywords_en',
        'title_fr',
        'description_fr',
        'meta_title_fr',
        'meta_description_fr',
        'meta_keywords_fr',
        'title_de',
        'description_de',
        'meta_title_de',
        'meta_description_de',
        'meta_keywords_de',
    ];

    public function getLocalizedTitle()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->title_en)) return $this->title_en;
        elseif ($locale === 'fr' && !empty($this->title_fr)) return $this->title_fr;
        elseif ($locale === 'de' && !empty($this->title_de)) return $this->title_de;
        return $this->title;
    }

    public function getLocalizedDescription()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->description_en)) return $this->description_en;
        elseif ($locale === 'fr' && !empty($this->description_fr)) return $this->description_fr;
        elseif ($locale === 'de' && !empty($this->description_de)) return $this->description_de;
        return $this->description;
    }

    public function getLocalizedMetaTitle()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->meta_title_en)) return $this->meta_title_en;
        elseif ($locale === 'fr' && !empty($this->meta_title_fr)) return $this->meta_title_fr;
        elseif ($locale === 'de' && !empty($this->meta_title_de)) return $this->meta_title_de;
        return $this->meta_title;
    }

    public function getLocalizedMetaDescription()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->meta_description_en)) return $this->meta_description_en;
        elseif ($locale === 'fr' && !empty($this->meta_description_fr)) return $this->meta_description_fr;
        elseif ($locale === 'de' && !empty($this->meta_description_de)) return $this->meta_description_de;
        return $this->meta_description;
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
