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
        Schema::table('services', function (Blueprint $table) {
            // English translations
            $table->string('hero_title_en')->nullable()->after('hero_title');
            $table->text('hero_description_en')->nullable()->after('hero_description');
            $table->string('name_en')->nullable()->after('name');
            $table->text('description_en')->nullable()->after('description');
            $table->string('title1_en')->nullable()->after('title1');
            $table->text('description1_en')->nullable()->after('description1');
            $table->string('title2_en')->nullable()->after('title2');
            $table->text('description2_en')->nullable()->after('description2');
            $table->string('portfolio_title_en')->nullable()->after('portfolio_title');
            $table->text('portfolio_description_en')->nullable()->after('portfolio_description');
            $table->string('meta_title_en')->nullable()->after('meta_title');
            $table->text('meta_description_en')->nullable()->after('meta_description');
            $table->string('meta_keywords_en')->nullable()->after('meta_keywords');
            
            // French translations
            $table->string('hero_title_fr')->nullable()->after('hero_title_en');
            $table->text('hero_description_fr')->nullable()->after('hero_description_en');
            $table->string('name_fr')->nullable()->after('name_en');
            $table->text('description_fr')->nullable()->after('description_en');
            $table->string('title1_fr')->nullable()->after('title1_en');
            $table->text('description1_fr')->nullable()->after('description1_en');
            $table->string('title2_fr')->nullable()->after('title2_en');
            $table->text('description2_fr')->nullable()->after('description2_en');
            $table->string('portfolio_title_fr')->nullable()->after('portfolio_title_en');
            $table->text('portfolio_description_fr')->nullable()->after('portfolio_description_en');
            $table->string('meta_title_fr')->nullable()->after('meta_title_en');
            $table->text('meta_description_fr')->nullable()->after('meta_description_en');
            $table->string('meta_keywords_fr')->nullable()->after('meta_keywords_en');
            
            // German translations
            $table->string('hero_title_de')->nullable()->after('hero_title_fr');
            $table->text('hero_description_de')->nullable()->after('hero_description_fr');
            $table->string('name_de')->nullable()->after('name_fr');
            $table->text('description_de')->nullable()->after('description_fr');
            $table->string('title1_de')->nullable()->after('title1_fr');
            $table->text('description1_de')->nullable()->after('description1_fr');
            $table->string('title2_de')->nullable()->after('title2_fr');
            $table->text('description2_de')->nullable()->after('description2_fr');
            $table->string('portfolio_title_de')->nullable()->after('portfolio_title_fr');
            $table->text('portfolio_description_de')->nullable()->after('portfolio_description_fr');
            $table->string('meta_title_de')->nullable()->after('meta_title_fr');
            $table->text('meta_description_de')->nullable()->after('meta_description_fr');
            $table->string('meta_keywords_de')->nullable()->after('meta_keywords_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title_en', 'hero_title_fr', 'hero_title_de',
                'hero_description_en', 'hero_description_fr', 'hero_description_de',
                'name_en', 'name_fr', 'name_de',
                'description_en', 'description_fr', 'description_de',
                'title1_en', 'title1_fr', 'title1_de',
                'description1_en', 'description1_fr', 'description1_de',
                'title2_en', 'title2_fr', 'title2_de',
                'description2_en', 'description2_fr', 'description2_de',
                'portfolio_title_en', 'portfolio_title_fr', 'portfolio_title_de',
                'portfolio_description_en', 'portfolio_description_fr', 'portfolio_description_de',
                'meta_title_en', 'meta_title_fr', 'meta_title_de',
                'meta_description_en', 'meta_description_fr', 'meta_description_de',
                'meta_keywords_en', 'meta_keywords_fr', 'meta_keywords_de',
            ]);
        });
    }
};
