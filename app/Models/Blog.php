<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = [
        'blogcategories_id',
        'title',
        'desc',
        'image',
        'thumbnail',
        'meta_title',
        'meta_desc',
        'meta_keyword',
        'slug',
        'tags',
        'status',
        'image_alt',
        'thumbnail_alt',
        // English
        'title_en',
        'desc_en',
        'meta_title_en',
        'meta_desc_en',
        'meta_keyword_en',
        // French
        'title_fr',
        'desc_fr',
        'meta_title_fr',
        'meta_desc_fr',
        'meta_keyword_fr',
        // German
        'title_de',
        'desc_de',
        'meta_title_de',
        'meta_desc_de',
        'meta_keyword_de',
    ];

    protected $casts = [
        'tags' => 'array',
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
    public function getLocalizedTitle()
    {
        return $this->getLocalizedField('title');
    }

    public function getLocalizedDesc()
    {
        return $this->getLocalizedField('desc');
    }

    public function getLocalizedMetaTitle()
    {
        return $this->getLocalizedField('meta_title');
    }

    public function getLocalizedMetaDesc()
    {
        return $this->getLocalizedField('meta_desc');
    }

    public function getLocalizedMetaKeyword()
    {
        return $this->getLocalizedField('meta_keyword');
    }

    // Define relationship with BlogCategory
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blogcategories_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
