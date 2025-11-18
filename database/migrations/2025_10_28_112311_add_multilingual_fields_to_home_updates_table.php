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
        Schema::table('home_updates', function (Blueprint $table) {
            // English fields for all 14 title/desc pairs + 3 meta fields
            $table->string('main_title_en')->nullable()->after('main_title');
            $table->text('main_desc_en')->nullable()->after('main_desc');
            $table->string('offer_title_en')->nullable()->after('offer_title');
            $table->text('offer_desc_en')->nullable()->after('offer_desc');
            $table->string('real_stories_title_en')->nullable()->after('real_stories_title');
            $table->text('real_stories_desc_en')->nullable()->after('real_stories_desc');
            $table->string('ai_section_title_en')->nullable()->after('ai_section_title');
            $table->text('ai_section_desc_en')->nullable()->after('ai_section_desc');
            $table->string('technology_section_title_en')->nullable()->after('technology_section_title');
            $table->text('technology_section_desc_en')->nullable()->after('technology_section_desc');
            $table->string('generative_ai_excellence_title_en')->nullable()->after('generative_ai_excellence_title');
            $table->text('generative_ai_excellence_desc_en')->nullable()->after('generative_ai_excellence_desc');
            $table->string('portfolio_section_title_en')->nullable()->after('portfolio_section_title');
            $table->text('portfolio_section_desc_en')->nullable()->after('portfolio_section_desc');
            $table->string('faq_section_title_en')->nullable()->after('faq_section_title');
            $table->text('faq_section_desc_en')->nullable()->after('faq_section_desc');
            $table->string('any_question_title_en')->nullable()->after('any_question_title');
            $table->text('any_question_desc_en')->nullable()->after('any_question_desc');
            $table->string('meta_title_en')->nullable()->after('meta_title');
            $table->text('meta_desc_en')->nullable()->after('meta_desc');
            $table->text('meta_keyword_en')->nullable()->after('meta_keyword');

            // French fields
            $table->string('main_title_fr')->nullable()->after('main_title_en');
            $table->text('main_desc_fr')->nullable()->after('main_desc_en');
            $table->string('offer_title_fr')->nullable()->after('offer_title_en');
            $table->text('offer_desc_fr')->nullable()->after('offer_desc_en');
            $table->string('real_stories_title_fr')->nullable()->after('real_stories_title_en');
            $table->text('real_stories_desc_fr')->nullable()->after('real_stories_desc_en');
            $table->string('ai_section_title_fr')->nullable()->after('ai_section_title_en');
            $table->text('ai_section_desc_fr')->nullable()->after('ai_section_desc_en');
            $table->string('technology_section_title_fr')->nullable()->after('technology_section_title_en');
            $table->text('technology_section_desc_fr')->nullable()->after('technology_section_desc_en');
            $table->string('generative_ai_excellence_title_fr')->nullable()->after('generative_ai_excellence_title_en');
            $table->text('generative_ai_excellence_desc_fr')->nullable()->after('generative_ai_excellence_desc_en');
            $table->string('portfolio_section_title_fr')->nullable()->after('portfolio_section_title_en');
            $table->text('portfolio_section_desc_fr')->nullable()->after('portfolio_section_desc_en');
            $table->string('faq_section_title_fr')->nullable()->after('faq_section_title_en');
            $table->text('faq_section_desc_fr')->nullable()->after('faq_section_desc_en');
            $table->string('any_question_title_fr')->nullable()->after('any_question_title_en');
            $table->text('any_question_desc_fr')->nullable()->after('any_question_desc_en');
            $table->string('meta_title_fr')->nullable()->after('meta_title_en');
            $table->text('meta_desc_fr')->nullable()->after('meta_desc_en');
            $table->text('meta_keyword_fr')->nullable()->after('meta_keyword_en');

            // German fields
            $table->string('main_title_de')->nullable()->after('main_title_fr');
            $table->text('main_desc_de')->nullable()->after('main_desc_fr');
            $table->string('offer_title_de')->nullable()->after('offer_title_fr');
            $table->text('offer_desc_de')->nullable()->after('offer_desc_fr');
            $table->string('real_stories_title_de')->nullable()->after('real_stories_title_fr');
            $table->text('real_stories_desc_de')->nullable()->after('real_stories_desc_fr');
            $table->string('ai_section_title_de')->nullable()->after('ai_section_title_fr');
            $table->text('ai_section_desc_de')->nullable()->after('ai_section_desc_fr');
            $table->string('technology_section_title_de')->nullable()->after('technology_section_title_fr');
            $table->text('technology_section_desc_de')->nullable()->after('technology_section_desc_fr');
            $table->string('generative_ai_excellence_title_de')->nullable()->after('generative_ai_excellence_title_fr');
            $table->text('generative_ai_excellence_desc_de')->nullable()->after('generative_ai_excellence_desc_fr');
            $table->string('portfolio_section_title_de')->nullable()->after('portfolio_section_title_fr');
            $table->text('portfolio_section_desc_de')->nullable()->after('portfolio_section_desc_fr');
            $table->string('faq_section_title_de')->nullable()->after('faq_section_title_fr');
            $table->text('faq_section_desc_de')->nullable()->after('faq_section_desc_fr');
            $table->string('any_question_title_de')->nullable()->after('any_question_title_fr');
            $table->text('any_question_desc_de')->nullable()->after('any_question_desc_fr');
            $table->string('meta_title_de')->nullable()->after('meta_title_fr');
            $table->text('meta_desc_de')->nullable()->after('meta_desc_fr');
            $table->text('meta_keyword_de')->nullable()->after('meta_keyword_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_updates', function (Blueprint $table) {
            $table->dropColumn([
                'main_title_en', 'main_desc_en', 'offer_title_en', 'offer_desc_en',
                'real_stories_title_en', 'real_stories_desc_en', 'ai_section_title_en', 'ai_section_desc_en',
                'technology_section_title_en', 'technology_section_desc_en', 'generative_ai_excellence_title_en', 'generative_ai_excellence_desc_en',
                'portfolio_section_title_en', 'portfolio_section_desc_en', 'faq_section_title_en', 'faq_section_desc_en',
                'any_question_title_en', 'any_question_desc_en', 'meta_title_en', 'meta_desc_en', 'meta_keyword_en',
                'main_title_fr', 'main_desc_fr', 'offer_title_fr', 'offer_desc_fr',
                'real_stories_title_fr', 'real_stories_desc_fr', 'ai_section_title_fr', 'ai_section_desc_fr',
                'technology_section_title_fr', 'technology_section_desc_fr', 'generative_ai_excellence_title_fr', 'generative_ai_excellence_desc_fr',
                'portfolio_section_title_fr', 'portfolio_section_desc_fr', 'faq_section_title_fr', 'faq_section_desc_fr',
                'any_question_title_fr', 'any_question_desc_fr', 'meta_title_fr', 'meta_desc_fr', 'meta_keyword_fr',
                'main_title_de', 'main_desc_de', 'offer_title_de', 'offer_desc_de',
                'real_stories_title_de', 'real_stories_desc_de', 'ai_section_title_de', 'ai_section_desc_de',
                'technology_section_title_de', 'technology_section_desc_de', 'generative_ai_excellence_title_de', 'generative_ai_excellence_desc_de',
                'portfolio_section_title_de', 'portfolio_section_desc_de', 'faq_section_title_de', 'faq_section_desc_de',
                'any_question_title_de', 'any_question_desc_de', 'meta_title_de', 'meta_desc_de', 'meta_keyword_de',
            ]);
        });
    }
};
