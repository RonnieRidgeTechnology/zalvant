<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
     protected $fillable = [
        'question',
        'answer',
        'question_en',
        'answer_en',
        'question_fr',
        'answer_fr',
        'question_de',
        'answer_de',
        'status',
    ];

    /**
     * Get localized question based on current locale
     */
    public function getLocalizedQuestion()
    {
        $locale = app()->getLocale();
        
        if ($locale === 'en' && !empty($this->question_en)) {
            return $this->question_en;
        } elseif ($locale === 'fr' && !empty($this->question_fr)) {
            return $this->question_fr;
        } elseif ($locale === 'de' && !empty($this->question_de)) {
            return $this->question_de;
        }
        
        return $this->question; // Fallback to Dutch
    }

    /**
     * Get localized answer based on current locale
     */
    public function getLocalizedAnswer()
    {
        $locale = app()->getLocale();
        
        if ($locale === 'en' && !empty($this->answer_en)) {
            return $this->answer_en;
        } elseif ($locale === 'fr' && !empty($this->answer_fr)) {
            return $this->answer_fr;
        } elseif ($locale === 'de' && !empty($this->answer_de)) {
            return $this->answer_de;
        }
        
        return $this->answer; // Fallback to Dutch
    }
}
