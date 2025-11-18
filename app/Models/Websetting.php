<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Websetting extends Model
{
      protected $fillable = [
        'logo',
        'favicon_logo',
        'phone',
        'email',
        'address',
        'linkedin',
        'insta',
        'facebook',
        'twitter',
        'tiktok',
        'footer_desc',
        'copyright',
        'og_image',
        'available_languages',
        // Multilingual fields
        'address_en', 'address_fr', 'address_de',
        'copyright_en', 'copyright_fr', 'copyright_de',
        'footer_desc_en', 'footer_desc_fr', 'footer_desc_de',
    ];

    /**
     * Get available languages as an array
     */
    public function getAvailableLanguagesArrayAttribute()
    {
        if (empty($this->available_languages)) {
            return ['nl', 'en', 'fr', 'de']; // Default languages
        }
        return array_map('trim', explode(',', $this->available_languages));
    }

    /**
     * Get address in current locale
     */
    public function getLocalizedAddress($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $field = $locale === 'nl' ? 'address' : "address_{$locale}";
        return $this->$field ?? $this->address; // Fallback to Dutch
    }

    /**
     * Get copyright in current locale
     */
    public function getLocalizedCopyright($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $field = $locale === 'nl' ? 'copyright' : "copyright_{$locale}";
        return $this->$field ?? $this->copyright; // Fallback to Dutch
    }

    /**
     * Get footer description in current locale
     */
    public function getLocalizedFooterDesc($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $field = $locale === 'nl' ? 'footer_desc' : "footer_desc_{$locale}";
        return $this->$field ?? $this->footer_desc; // Fallback to Dutch
    }
}
