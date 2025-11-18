<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeUpdate extends Model
{
    protected $fillable = [
        // Dutch (Default)
        'main_title', 'main_desc',
        'offer_title', 'offer_desc',
        'real_stories_title', 'real_stories_desc',
        'ai_section_title', 'ai_section_desc',
        'technology_section_title', 'technology_section_desc',
        'generative_ai_excellence_title', 'generative_ai_excellence_desc',
        'portfolio_section_title', 'portfolio_section_desc',
        'faq_section_title', 'faq_section_desc',
        'any_question_title', 'any_question_desc',
        'meta_title', 'meta_desc', 'meta_keyword',

        // English
        'main_title_en', 'main_desc_en',
        'offer_title_en', 'offer_desc_en',
        'real_stories_title_en', 'real_stories_desc_en',
        'ai_section_title_en', 'ai_section_desc_en',
        'technology_section_title_en', 'technology_section_desc_en',
        'generative_ai_excellence_title_en', 'generative_ai_excellence_desc_en',
        'portfolio_section_title_en', 'portfolio_section_desc_en',
        'faq_section_title_en', 'faq_section_desc_en',
        'any_question_title_en', 'any_question_desc_en',
        'meta_title_en', 'meta_desc_en', 'meta_keyword_en',

        // French
        'main_title_fr', 'main_desc_fr',
        'offer_title_fr', 'offer_desc_fr',
        'real_stories_title_fr', 'real_stories_desc_fr',
        'ai_section_title_fr', 'ai_section_desc_fr',
        'technology_section_title_fr', 'technology_section_desc_fr',
        'generative_ai_excellence_title_fr', 'generative_ai_excellence_desc_fr',
        'portfolio_section_title_fr', 'portfolio_section_desc_fr',
        'faq_section_title_fr', 'faq_section_desc_fr',
        'any_question_title_fr', 'any_question_desc_fr',
        'meta_title_fr', 'meta_desc_fr', 'meta_keyword_fr',

        // German
        'main_title_de', 'main_desc_de',
        'offer_title_de', 'offer_desc_de',
        'real_stories_title_de', 'real_stories_desc_de',
        'ai_section_title_de', 'ai_section_desc_de',
        'technology_section_title_de', 'technology_section_desc_de',
        'generative_ai_excellence_title_de', 'generative_ai_excellence_desc_de',
        'portfolio_section_title_de', 'portfolio_section_desc_de',
        'faq_section_title_de', 'faq_section_desc_de',
        'any_question_title_de', 'any_question_desc_de',
        'meta_title_de', 'meta_desc_de', 'meta_keyword_de',
    ];

    /**
     * Generic getter method for localized content
     */
    private function getLocalized($field)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->{$field . '_en'})) return $this->{$field . '_en'};
        elseif ($locale === 'fr' && !empty($this->{$field . '_fr'})) return $this->{$field . '_fr'};
        elseif ($locale === 'de' && !empty($this->{$field . '_de'})) return $this->{$field . '_de'};
        return $this->{$field};
    }

    // Main
    public function getLocalizedMainTitle() { return $this->getLocalized('main_title'); }
    public function getLocalizedMainDesc() { return $this->getLocalized('main_desc'); }

    // Offer
    public function getLocalizedOfferTitle() { return $this->getLocalized('offer_title'); }
    public function getLocalizedOfferDesc() { return $this->getLocalized('offer_desc'); }

    // Real Stories
    public function getLocalizedRealStoriesTitle() { return $this->getLocalized('real_stories_title'); }
    public function getLocalizedRealStoriesDesc() { return $this->getLocalized('real_stories_desc'); }

    // AI Section
    public function getLocalizedAiSectionTitle() { return $this->getLocalized('ai_section_title'); }
    public function getLocalizedAiSectionDesc() { return $this->getLocalized('ai_section_desc'); }

    // Technology Section
    public function getLocalizedTechnologySectionTitle() { return $this->getLocalized('technology_section_title'); }
    public function getLocalizedTechnologySectionDesc() { return $this->getLocalized('technology_section_desc'); }

    // Generative AI Excellence
    public function getLocalizedGenerativeAiExcellenceTitle() { return $this->getLocalized('generative_ai_excellence_title'); }
    public function getLocalizedGenerativeAiExcellenceDesc() { return $this->getLocalized('generative_ai_excellence_desc'); }

    // Portfolio Section
    public function getLocalizedPortfolioSectionTitle() { return $this->getLocalized('portfolio_section_title'); }
    public function getLocalizedPortfolioSectionDesc() { return $this->getLocalized('portfolio_section_desc'); }

    // FAQ Section
    public function getLocalizedFaqSectionTitle() { return $this->getLocalized('faq_section_title'); }
    public function getLocalizedFaqSectionDesc() { return $this->getLocalized('faq_section_desc'); }

    // Any Question
    public function getLocalizedAnyQuestionTitle() { return $this->getLocalized('any_question_title'); }
    public function getLocalizedAnyQuestionDesc() { return $this->getLocalized('any_question_desc'); }

    // Meta
    public function getLocalizedMetaTitle() { return $this->getLocalized('meta_title'); }
    public function getLocalizedMetaDesc() { return $this->getLocalized('meta_desc'); }
    public function getLocalizedMetaKeyword() { return $this->getLocalized('meta_keyword'); }
}
