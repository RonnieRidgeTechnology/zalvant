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
        Schema::table('service_updates', function (Blueprint $table) {
            // English translations
            $table->string('main_title_en')->nullable()->after('main_title');
            $table->text('main_desc_en')->nullable()->after('main_desc');
            $table->string('offer_title_en')->nullable()->after('offer_title');
            $table->text('offer_desc_en')->nullable()->after('offer_desc');
            $table->string('technology_title_en')->nullable()->after('technology_title');
            $table->text('technology_desc_en')->nullable()->after('technology_desc');
            $table->string('deal_ai_title_en')->nullable()->after('deal_ai_title');
            $table->text('deal_ai_desc_en')->nullable()->after('deal_ai_desc');
            $table->string('any_question_title_en')->nullable()->after('any_question_title');
            $table->text('any_question_desc_en')->nullable()->after('any_question_desc');
            $table->string('meta_title_en')->nullable()->after('meta_title');
            $table->text('meta_desc_en')->nullable()->after('meta_desc');
            $table->string('meta_keyword_en')->nullable()->after('meta_keyword');
            
            // French translations
            $table->string('main_title_fr')->nullable()->after('main_title_en');
            $table->text('main_desc_fr')->nullable()->after('main_desc_en');
            $table->string('offer_title_fr')->nullable()->after('offer_title_en');
            $table->text('offer_desc_fr')->nullable()->after('offer_desc_en');
            $table->string('technology_title_fr')->nullable()->after('technology_title_en');
            $table->text('technology_desc_fr')->nullable()->after('technology_desc_en');
            $table->string('deal_ai_title_fr')->nullable()->after('deal_ai_title_en');
            $table->text('deal_ai_desc_fr')->nullable()->after('deal_ai_desc_en');
            $table->string('any_question_title_fr')->nullable()->after('any_question_title_en');
            $table->text('any_question_desc_fr')->nullable()->after('any_question_desc_en');
            $table->string('meta_title_fr')->nullable()->after('meta_title_en');
            $table->text('meta_desc_fr')->nullable()->after('meta_desc_en');
            $table->string('meta_keyword_fr')->nullable()->after('meta_keyword_en');
            
            // German translations
            $table->string('main_title_de')->nullable()->after('main_title_fr');
            $table->text('main_desc_de')->nullable()->after('main_desc_fr');
            $table->string('offer_title_de')->nullable()->after('offer_title_fr');
            $table->text('offer_desc_de')->nullable()->after('offer_desc_fr');
            $table->string('technology_title_de')->nullable()->after('technology_title_fr');
            $table->text('technology_desc_de')->nullable()->after('technology_desc_fr');
            $table->string('deal_ai_title_de')->nullable()->after('deal_ai_title_fr');
            $table->text('deal_ai_desc_de')->nullable()->after('deal_ai_desc_fr');
            $table->string('any_question_title_de')->nullable()->after('any_question_title_fr');
            $table->text('any_question_desc_de')->nullable()->after('any_question_desc_fr');
            $table->string('meta_title_de')->nullable()->after('meta_title_fr');
            $table->text('meta_desc_de')->nullable()->after('meta_desc_fr');
            $table->string('meta_keyword_de')->nullable()->after('meta_keyword_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_updates', function (Blueprint $table) {
            $table->dropColumn([
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
            ]);
        });
    }
};
