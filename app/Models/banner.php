<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    protected $table = 'banners';
    protected $fillable = [
        'banner_head_title',
        'banner_head_para',
        'banner_footer_title',
        'banner_footer_para',
        // English translations
        'banner_head_title_en',
        'banner_head_para_en',
        'banner_footer_title_en',
        'banner_footer_para_en',
        // French translations
        'banner_head_title_fr',
        'banner_head_para_fr',
        'banner_footer_title_fr',
        'banner_footer_para_fr',
        // German translations
        'banner_head_title_de',
        'banner_head_para_de',
        'banner_footer_title_de',
        'banner_footer_para_de',
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
    public function getLocalizedBannerHeadTitle($locale = null) { return $this->getLocalizedField('banner_head_title', $locale); }
    public function getLocalizedBannerHeadPara($locale = null) { return $this->getLocalizedField('banner_head_para', $locale); }
    public function getLocalizedBannerFooterTitle($locale = null) { return $this->getLocalizedField('banner_footer_title', $locale); }
    public function getLocalizedBannerFooterPara($locale = null) { return $this->getLocalizedField('banner_footer_para', $locale); }
}
