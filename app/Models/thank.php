<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class thank extends Model
{
    protected $table ='thanks';
    protected $fillable = [
        'thank_title',
        'thank_subtitle',
        'chip_1',
        'chip_2',
        'chip_3',
        'button_text',
        // English translations
        'thank_title_en',
        'thank_subtitle_en',
        'chip_1_en',
        'chip_2_en',
        'chip_3_en',
        'button_text_en',
        // French translations
        'thank_title_fr',
        'thank_subtitle_fr',
        'chip_1_fr',
        'chip_2_fr',
        'chip_3_fr',
        'button_text_fr',
        // German translations
        'thank_title_de',
        'thank_subtitle_de',
        'chip_1_de',
        'chip_2_de',
        'chip_3_de',
        'button_text_de',
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
    public function getLocalizedThankTitle($locale = null) { return $this->getLocalizedField('thank_title', $locale); }
    public function getLocalizedThankSubtitle($locale = null) { return $this->getLocalizedField('thank_subtitle', $locale); }
    public function getLocalizedChip1($locale = null) { return $this->getLocalizedField('chip_1', $locale); }
    public function getLocalizedChip2($locale = null) { return $this->getLocalizedField('chip_2', $locale); }
    public function getLocalizedChip3($locale = null) { return $this->getLocalizedField('chip_3', $locale); }
    public function getLocalizedButtonText($locale = null) { return $this->getLocalizedField('button_text', $locale); }
}
