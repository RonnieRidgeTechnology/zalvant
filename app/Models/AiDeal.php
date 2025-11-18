<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiDeal extends Model
{
    protected $table = 'ai_deals';
    protected $fillable = [
        'name',
        'desc',
        'image',
        
        'status',
        // English translations
        'name_en',
        'desc_en',
        // French translations
        'name_fr',
        'desc_fr',
        // German translations
        'name_de',
        'desc_de',
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
    public function getLocalizedName($locale = null)
    {
        return $this->getLocalizedField('name', $locale);
    }

    public function getLocalizedDesc($locale = null)
    {
        return $this->getLocalizedField('desc', $locale);
    }
}
