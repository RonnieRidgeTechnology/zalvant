<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('landing_types', function (Blueprint $table) {
            // Banner section fields
            $table->text('main_title')->nullable();
            $table->text('main_title_en')->nullable();
            $table->text('main_title_fr')->nullable();
            $table->text('main_title_de')->nullable();
            $table->text('main_desc')->nullable();
            $table->text('main_desc_en')->nullable();
            $table->text('main_desc_fr')->nullable();
            $table->text('main_desc_de')->nullable();

            // Offer section fields
            $table->text('offer_title')->nullable();
            $table->text('offer_title_en')->nullable();
            $table->text('offer_title_fr')->nullable();
            $table->text('offer_title_de')->nullable();
            $table->text('offer_desc')->nullable();
            $table->text('offer_desc_en')->nullable();
            $table->text('offer_desc_fr')->nullable();
            $table->text('offer_desc_de')->nullable();

            // AI Deals section fields
            $table->text('deal_ai_title')->nullable();
            $table->text('deal_ai_title_en')->nullable();
            $table->text('deal_ai_title_fr')->nullable();
            $table->text('deal_ai_title_de')->nullable();
            $table->text('deal_ai_desc')->nullable();
            $table->text('deal_ai_desc_en')->nullable();
            $table->text('deal_ai_desc_fr')->nullable();
            $table->text('deal_ai_desc_de')->nullable();

            // Deal 1 fields
            $table->string('deal1_name')->nullable();
            $table->string('deal1_name_en')->nullable();
            $table->string('deal1_name_fr')->nullable();
            $table->string('deal1_name_de')->nullable();
            $table->text('deal1_desc')->nullable();
            $table->text('deal1_desc_en')->nullable();
            $table->text('deal1_desc_fr')->nullable();
            $table->text('deal1_desc_de')->nullable();
            $table->string('deal1_image')->nullable();

            // Deal 2 fields
            $table->string('deal2_name')->nullable();
            $table->string('deal2_name_en')->nullable();
            $table->string('deal2_name_fr')->nullable();
            $table->string('deal2_name_de')->nullable();
            $table->text('deal2_desc')->nullable();
            $table->text('deal2_desc_en')->nullable();
            $table->text('deal2_desc_fr')->nullable();
            $table->text('deal2_desc_de')->nullable();
            $table->string('deal2_image')->nullable();

            // Deal 3 fields
            $table->string('deal3_name')->nullable();
            $table->string('deal3_name_en')->nullable();
            $table->string('deal3_name_fr')->nullable();
            $table->string('deal3_name_de')->nullable();
            $table->text('deal3_desc')->nullable();
            $table->text('deal3_desc_en')->nullable();
            $table->text('deal3_desc_fr')->nullable();
            $table->text('deal3_desc_de')->nullable();
            $table->string('deal3_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('landing_types', function (Blueprint $table) {
            $table->dropColumn([
                'main_title', 'main_title_en', 'main_title_fr', 'main_title_de',
                'main_desc', 'main_desc_en', 'main_desc_fr', 'main_desc_de',
                'offer_title', 'offer_title_en', 'offer_title_fr', 'offer_title_de',
                'offer_desc', 'offer_desc_en', 'offer_desc_fr', 'offer_desc_de',
                'deal_ai_title', 'deal_ai_title_en', 'deal_ai_title_fr', 'deal_ai_title_de',
                'deal_ai_desc', 'deal_ai_desc_en', 'deal_ai_desc_fr', 'deal_ai_desc_de',
                'deal1_name', 'deal1_name_en', 'deal1_name_fr', 'deal1_name_de',
                'deal1_desc', 'deal1_desc_en', 'deal1_desc_fr', 'deal1_desc_de', 'deal1_image',
                'deal2_name', 'deal2_name_en', 'deal2_name_fr', 'deal2_name_de',
                'deal2_desc', 'deal2_desc_en', 'deal2_desc_fr', 'deal2_desc_de', 'deal2_image',
                'deal3_name', 'deal3_name_en', 'deal3_name_fr', 'deal3_name_de',
                'deal3_desc', 'deal3_desc_en', 'deal3_desc_fr', 'deal3_desc_de', 'deal3_image',
            ]);
        });
    }
};
