<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stat extends Model
{
    protected $table = 'stats'; // table ka name
    protected $fillable = [
        'happy_clients',
        'client_label',
        'tours_completed',
        'completed_label',
        'awards',
        'awards_label',
        'experience_years',
        'experience_label',
        // English translations (labels only)
        'client_label_en',
        'completed_label_en',
        'awards_label_en',
        'experience_label_en',
        // French translations (labels only)
        'client_label_fr',
        'completed_label_fr',
        'awards_label_fr',
        'experience_label_fr',
        // German translations (labels only)
        'client_label_de',
        'completed_label_de',
        'awards_label_de',
        'experience_label_de',
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

    // Localized getters for labels
    public function getLocalizedClientLabel($locale = null) { return $this->getLocalizedField('client_label', $locale); }
    public function getLocalizedCompletedLabel($locale = null) { return $this->getLocalizedField('completed_label', $locale); }
    public function getLocalizedAwardsLabel($locale = null) { return $this->getLocalizedField('awards_label', $locale); }
    public function getLocalizedExperienceLabel($locale = null) { return $this->getLocalizedField('experience_label', $locale); }
}
