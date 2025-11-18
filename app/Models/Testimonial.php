<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'message',
        'name_en',
        'message_en',
        'name_fr',
        'message_fr',
        'name_de',
        'message_de',
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
     * Get localized message based on current locale
     */
    public function getLocalizedMessage()
    {
        $locale = app()->getLocale();
        
        if ($locale === 'en' && !empty($this->message_en)) {
            return $this->message_en;
        } elseif ($locale === 'fr' && !empty($this->message_fr)) {
            return $this->message_fr;
        } elseif ($locale === 'de' && !empty($this->message_de)) {
            return $this->message_de;
        }
        
        return $this->message; // Fallback to Dutch
    }
}
