<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandingType extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'name_fr',
        'name_de',
        'order',
        'status',
        'slug',
        // Banner section
        'main_title',
        'main_title_en',
        'main_title_fr',
        'main_title_de',
        'main_desc',
        'main_desc_en',
        'main_desc_fr',
        'main_desc_de',
        // Offer section
        'offer_title',
        'offer_title_en',
        'offer_title_fr',
        'offer_title_de',
        'offer_desc',
        'offer_desc_en',
        'offer_desc_fr',
        'offer_desc_de',
        // AI Deals section
        'deal_ai_title',
        'deal_ai_title_en',
        'deal_ai_title_fr',
        'deal_ai_title_de',
        'deal_ai_desc',
        'deal_ai_desc_en',
        'deal_ai_desc_fr',
        'deal_ai_desc_de',
        // Deal 1
        'deal1_name',
        'deal1_name_en',
        'deal1_name_fr',
        'deal1_name_de',
        'deal1_desc',
        'deal1_desc_en',
        'deal1_desc_fr',
        'deal1_desc_de',
        'deal1_image',
        // Deal 2
        'deal2_name',
        'deal2_name_en',
        'deal2_name_fr',
        'deal2_name_de',
        'deal2_desc',
        'deal2_desc_en',
        'deal2_desc_fr',
        'deal2_desc_de',
        'deal2_image',
        // Deal 3
        'deal3_name',
        'deal3_name_en',
        'deal3_name_fr',
        'deal3_name_de',
        'deal3_desc',
        'deal3_desc_en',
        'deal3_desc_fr',
        'deal3_desc_de',
        'deal3_image',
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function (LandingType $type) {
            if (empty($type->slug)) {
                $type->slug = static::generateUniqueSlug($type->name);
            }
        });

        static::updating(function (LandingType $type) {
            if (empty($type->slug)) {
                $type->slug = static::generateUniqueSlug($type->name, $type->id);
            }
        });
    }

    private static function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }

    /**
     * Get localized field value
     */
    private function getLocalizedField($field, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $localizedField = $locale === 'nl' ? $field : "{$field}_{$locale}";
        return $this->$localizedField ?? $this->$field;
    }

    /**
     * Get localized name
     */
    public function getLocalizedName($locale = null)
    {
        return $this->getLocalizedField('name', $locale);
    }

    // Banner section localized getters
    public function getLocalizedMainTitle($locale = null)
    {
        return $this->getLocalizedField('main_title', $locale);
    }

    public function getLocalizedMainDesc($locale = null)
    {
        return $this->getLocalizedField('main_desc', $locale);
    }

    // Offer section localized getters
    public function getLocalizedOfferTitle($locale = null)
    {
        return $this->getLocalizedField('offer_title', $locale);
    }

    public function getLocalizedOfferDesc($locale = null)
    {
        return $this->getLocalizedField('offer_desc', $locale);
    }

    // AI Deals section localized getters
    public function getLocalizedDealAiTitle($locale = null)
    {
        return $this->getLocalizedField('deal_ai_title', $locale);
    }

    public function getLocalizedDealAiDesc($locale = null)
    {
        return $this->getLocalizedField('deal_ai_desc', $locale);
    }

    // Deal 1 localized getters
    public function getLocalizedDeal1Name($locale = null)
    {
        return $this->getLocalizedField('deal1_name', $locale);
    }

    public function getLocalizedDeal1Desc($locale = null)
    {
        return $this->getLocalizedField('deal1_desc', $locale);
    }

    // Deal 2 localized getters
    public function getLocalizedDeal2Name($locale = null)
    {
        return $this->getLocalizedField('deal2_name', $locale);
    }

    public function getLocalizedDeal2Desc($locale = null)
    {
        return $this->getLocalizedField('deal2_desc', $locale);
    }

    // Deal 3 localized getters
    public function getLocalizedDeal3Name($locale = null)
    {
        return $this->getLocalizedField('deal3_name', $locale);
    }

    public function getLocalizedDeal3Desc($locale = null)
    {
        return $this->getLocalizedField('deal3_desc', $locale);
    }

    /**
     * Get services associated with this landing type
     */
    public function services()
    {
        return $this->hasMany(Service::class, 'landing_type_id');
    }

    /**
     * Get active services for this landing type
     */
    public function getServices()
    {
        return $this->services()->where('status', 1)->orderBy('order_by', 'asc')->get();
    }
}

