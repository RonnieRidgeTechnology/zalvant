<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingFormLabel extends Model
{
    protected $table = 'landing_form_labels';
    
    protected $fillable = [
        // Dutch (default) labels
        'required_note', 'name_label', 'email_label', 'phone_label', 'service_label', 'message_label',
        'name_placeholder', 'email_placeholder', 'phone_placeholder', 'service_placeholder', 'message_placeholder',
        'submit_button', 'success_message',
        
        // English translations
        'required_note_en', 'name_label_en', 'email_label_en', 'phone_label_en', 'service_label_en', 'message_label_en',
        'name_placeholder_en', 'email_placeholder_en', 'phone_placeholder_en', 'service_placeholder_en', 'message_placeholder_en',
        'submit_button_en', 'success_message_en',
        
        // French translations
        'required_note_fr', 'name_label_fr', 'email_label_fr', 'phone_label_fr', 'service_label_fr', 'message_label_fr',
        'name_placeholder_fr', 'email_placeholder_fr', 'phone_placeholder_fr', 'service_placeholder_fr', 'message_placeholder_fr',
        'submit_button_fr', 'success_message_fr',
        
        // German translations
        'required_note_de', 'name_label_de', 'email_label_de', 'phone_label_de', 'service_label_de', 'message_label_de',
        'name_placeholder_de', 'email_placeholder_de', 'phone_placeholder_de', 'service_placeholder_de', 'message_placeholder_de',
        'submit_button_de', 'success_message_de',
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
    public function getLocalizedRequiredNote($locale = null) { return $this->getLocalizedField('required_note', $locale); }
    public function getLocalizedNameLabel($locale = null) { return $this->getLocalizedField('name_label', $locale); }
    public function getLocalizedEmailLabel($locale = null) { return $this->getLocalizedField('email_label', $locale); }
    public function getLocalizedPhoneLabel($locale = null) { return $this->getLocalizedField('phone_label', $locale); }
    public function getLocalizedServiceLabel($locale = null) { return $this->getLocalizedField('service_label', $locale); }
    public function getLocalizedMessageLabel($locale = null) { return $this->getLocalizedField('message_label', $locale); }
    public function getLocalizedNamePlaceholder($locale = null) { return $this->getLocalizedField('name_placeholder', $locale); }
    public function getLocalizedEmailPlaceholder($locale = null) { return $this->getLocalizedField('email_placeholder', $locale); }
    public function getLocalizedPhonePlaceholder($locale = null) { return $this->getLocalizedField('phone_placeholder', $locale); }
    public function getLocalizedServicePlaceholder($locale = null) { return $this->getLocalizedField('service_placeholder', $locale); }
    public function getLocalizedMessagePlaceholder($locale = null) { return $this->getLocalizedField('message_placeholder', $locale); }
    public function getLocalizedSubmitButton($locale = null) { return $this->getLocalizedField('submit_button', $locale); }
    public function getLocalizedSuccessMessage($locale = null) { return $this->getLocalizedField('success_message', $locale); }
}
