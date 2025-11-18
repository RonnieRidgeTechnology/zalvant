<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUpdate extends Model
{
    protected $table = 'about_update';

    protected $fillable = [
        'main_title',
        'main_desc',
        'journey_title',
        'journey_desc',
        'satisfied_clients',
        'finished_projects',
        'years_of_experience',
        'skilled_experts',
        'core_values_title',
        'core_values_desc',
        'why_choose_us_title',
        'why_choose_us_desc',
        'have_you_any_question_title',
        'have_you_any_question_desc',
        'meta_title',
        'meta_keywords',
        'meta_desc',
        // Multilingual fields
        'main_title_en', 'main_title_fr', 'main_title_de',
        'main_desc_en', 'main_desc_fr', 'main_desc_de',
        'journey_title_en', 'journey_title_fr', 'journey_title_de',
        'journey_desc_en', 'journey_desc_fr', 'journey_desc_de',
        'core_values_title_en', 'core_values_title_fr', 'core_values_title_de',
        'core_values_desc_en', 'core_values_desc_fr', 'core_values_desc_de',
        'why_choose_us_title_en', 'why_choose_us_title_fr', 'why_choose_us_title_de',
        'why_choose_us_desc_en', 'why_choose_us_desc_fr', 'why_choose_us_desc_de',
        'meta_title_en', 'meta_title_fr', 'meta_title_de',
        'meta_keywords_en', 'meta_keywords_fr', 'meta_keywords_de',
        'meta_desc_en', 'meta_desc_fr', 'meta_desc_de',
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
    public function getLocalizedMainTitle($locale = null) { return $this->getLocalizedField('main_title', $locale); }
    public function getLocalizedMainDesc($locale = null) { return $this->getLocalizedField('main_desc', $locale); }
    public function getLocalizedJourneyTitle($locale = null) { return $this->getLocalizedField('journey_title', $locale); }
    public function getLocalizedJourneyDesc($locale = null) { return $this->getLocalizedField('journey_desc', $locale); }
    public function getLocalizedCoreValuesTitle($locale = null) { return $this->getLocalizedField('core_values_title', $locale); }
    public function getLocalizedCoreValuesDesc($locale = null) { return $this->getLocalizedField('core_values_desc', $locale); }
    public function getLocalizedWhyChooseUsTitle($locale = null) { return $this->getLocalizedField('why_choose_us_title', $locale); }
    public function getLocalizedWhyChooseUsDesc($locale = null) { return $this->getLocalizedField('why_choose_us_desc', $locale); }
    public function getLocalizedMetaTitle($locale = null) { return $this->getLocalizedField('meta_title', $locale); }
    public function getLocalizedMetaKeywords($locale = null) { return $this->getLocalizedField('meta_keywords', $locale); }
    public function getLocalizedMetaDesc($locale = null) { return $this->getLocalizedField('meta_desc', $locale); }
}
