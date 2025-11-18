<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    protected $table = 'core_values';
    protected $fillable = [
        'name',
        'desc',
        'name_en',
        'desc_en',
        'name_fr',
        'desc_fr',
        'name_de',
        'desc_de',
        'status',
    ];

    /**
     * Get localized name based on current locale
     */
    public function getLocalizedName()
    {
        $locale = app()->getLocale();
        
        if ($locale === 'en' && !empty($this->name_en)) {
            return $this->name_en;
        } elseif ($locale === 'fr' && !empty($this->name_fr)) {
            return $this->name_fr;
        } elseif ($locale === 'de' && !empty($this->name_de)) {
            return $this->name_de;
        }
        
        return $this->name; // Fallback to Dutch
    }

    /**
     * Get localized description based on current locale
     */
    public function getLocalizedDesc()
    {
        $locale = app()->getLocale();
        
        if ($locale === 'en' && !empty($this->desc_en)) {
            return $this->desc_en;
        } elseif ($locale === 'fr' && !empty($this->desc_fr)) {
            return $this->desc_fr;
        } elseif ($locale === 'de' && !empty($this->desc_de)) {
            return $this->desc_de;
        }
        
        return $this->desc; // Fallback to Dutch
    }
}
