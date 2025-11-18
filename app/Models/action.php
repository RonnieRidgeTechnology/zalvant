<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'actions'; 

    protected $fillable = [
        'eyebrow',
        'heading',
        'sub_text',
        'chip_one',
        'chip_two',
        'chip_three',
        'phone',
        'email',
        'footer_note',
        // English translations
        'eyebrow_en',
        'heading_en',
        'sub_text_en',
        'chip_one_en',
        'chip_two_en',
        'chip_three_en',
        'footer_note_en',
        // French translations
        'eyebrow_fr',
        'heading_fr',
        'sub_text_fr',
        'chip_one_fr',
        'chip_two_fr',
        'chip_three_fr',
        'footer_note_fr',
        // German translations
        'eyebrow_de',
        'heading_de',
        'sub_text_de',
        'chip_one_de',
        'chip_two_de',
        'chip_three_de',
        'footer_note_de',
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
    public function getLocalizedEyebrow($locale = null) { return $this->getLocalizedField('eyebrow', $locale); }
    public function getLocalizedHeading($locale = null) { return $this->getLocalizedField('heading', $locale); }
    public function getLocalizedSubText($locale = null) { return $this->getLocalizedField('sub_text', $locale); }
    public function getLocalizedChipOne($locale = null) { return $this->getLocalizedField('chip_one', $locale); }
    public function getLocalizedChipTwo($locale = null) { return $this->getLocalizedField('chip_two', $locale); }
    public function getLocalizedChipThree($locale = null) { return $this->getLocalizedField('chip_three', $locale); }
    public function getLocalizedFooterNote($locale = null) { return $this->getLocalizedField('footer_note', $locale); }
}

