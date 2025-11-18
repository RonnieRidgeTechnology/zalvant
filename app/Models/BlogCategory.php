<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = [
        'title',
        'status',
        'slug',
        // English
        'title_en',
        // French
        'title_fr',
        // German
        'title_de',
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

    // Localized getter
    public function getLocalizedTitle()
    {
        return $this->getLocalizedField('title');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blogcategories_id');
    }
}
