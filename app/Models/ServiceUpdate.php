<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceUpdate extends Model
{
     protected $fillable = [
        'main_title',
        'main_desc',
        'offer_title',
        'offer_desc',
        'technology_title',
        'technology_desc',
        'deal_ai_title',
        'deal_ai_desc',
        'any_question_title',
        'any_question_desc',
        'meta_title',
        'meta_desc',
        'meta_keyword',
        // Multilingual fields
        'main_title_en', 'main_title_fr', 'main_title_de',
        'main_desc_en', 'main_desc_fr', 'main_desc_de',
        'offer_title_en', 'offer_title_fr', 'offer_title_de',
        'offer_desc_en', 'offer_desc_fr', 'offer_desc_de',
        'technology_title_en', 'technology_title_fr', 'technology_title_de',
        'technology_desc_en', 'technology_desc_fr', 'technology_desc_de',
        'deal_ai_title_en', 'deal_ai_title_fr', 'deal_ai_title_de',
        'deal_ai_desc_en', 'deal_ai_desc_fr', 'deal_ai_desc_de',
        'any_question_title_en', 'any_question_title_fr', 'any_question_title_de',
        'any_question_desc_en', 'any_question_desc_fr', 'any_question_desc_de',
        'meta_title_en', 'meta_title_fr', 'meta_title_de',
        'meta_desc_en', 'meta_desc_fr', 'meta_desc_de',
        'meta_keyword_en', 'meta_keyword_fr', 'meta_keyword_de',
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
    public function getLocalizedOfferTitle($locale = null) { return $this->getLocalizedField('offer_title', $locale); }
    public function getLocalizedOfferDesc($locale = null) { return $this->getLocalizedField('offer_desc', $locale); }
    public function getLocalizedTechnologyTitle($locale = null) { return $this->getLocalizedField('technology_title', $locale); }
    public function getLocalizedTechnologyDesc($locale = null) { return $this->getLocalizedField('technology_desc', $locale); }
    public function getLocalizedDealAiTitle($locale = null) { return $this->getLocalizedField('deal_ai_title', $locale); }
    public function getLocalizedDealAiDesc($locale = null) { return $this->getLocalizedField('deal_ai_desc', $locale); }
    public function getLocalizedAnyQuestionTitle($locale = null) { return $this->getLocalizedField('any_question_title', $locale); }
    public function getLocalizedAnyQuestionDesc($locale = null) { return $this->getLocalizedField('any_question_desc', $locale); }
    public function getLocalizedMetaTitle($locale = null) { return $this->getLocalizedField('meta_title', $locale); }
    public function getLocalizedMetaDesc($locale = null) { return $this->getLocalizedField('meta_desc', $locale); }
    public function getLocalizedMetaKeyword($locale = null) { return $this->getLocalizedField('meta_keyword', $locale); }
}
