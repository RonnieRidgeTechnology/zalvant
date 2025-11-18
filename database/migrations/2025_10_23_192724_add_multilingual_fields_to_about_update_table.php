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
        Schema::table('about_update', function (Blueprint $table) {
            // English translations
            $table->string('main_title_en')->nullable()->after('main_title');
            $table->text('main_desc_en')->nullable()->after('main_desc');
            $table->string('journey_title_en')->nullable()->after('journey_title');
            $table->text('journey_desc_en')->nullable()->after('journey_desc');
            $table->string('core_values_title_en')->nullable()->after('core_values_title');
            $table->text('core_values_desc_en')->nullable()->after('core_values_desc');
            $table->string('why_choose_us_title_en')->nullable()->after('why_choose_us_title');
            $table->text('why_choose_us_desc_en')->nullable()->after('why_choose_us_desc');
            $table->string('meta_title_en')->nullable()->after('meta_title');
            $table->string('meta_keywords_en')->nullable()->after('meta_keywords');
            $table->string('meta_desc_en')->nullable()->after('meta_desc');
            
            // French translations
            $table->string('main_title_fr')->nullable()->after('main_title_en');
            $table->text('main_desc_fr')->nullable()->after('main_desc_en');
            $table->string('journey_title_fr')->nullable()->after('journey_title_en');
            $table->text('journey_desc_fr')->nullable()->after('journey_desc_en');
            $table->string('core_values_title_fr')->nullable()->after('core_values_title_en');
            $table->text('core_values_desc_fr')->nullable()->after('core_values_desc_en');
            $table->string('why_choose_us_title_fr')->nullable()->after('why_choose_us_title_en');
            $table->text('why_choose_us_desc_fr')->nullable()->after('why_choose_us_desc_en');
            $table->string('meta_title_fr')->nullable()->after('meta_title_en');
            $table->string('meta_keywords_fr')->nullable()->after('meta_keywords_en');
            $table->string('meta_desc_fr')->nullable()->after('meta_desc_en');
            
            // German translations
            $table->string('main_title_de')->nullable()->after('main_title_fr');
            $table->text('main_desc_de')->nullable()->after('main_desc_fr');
            $table->string('journey_title_de')->nullable()->after('journey_title_fr');
            $table->text('journey_desc_de')->nullable()->after('journey_desc_fr');
            $table->string('core_values_title_de')->nullable()->after('core_values_title_fr');
            $table->text('core_values_desc_de')->nullable()->after('core_values_desc_fr');
            $table->string('why_choose_us_title_de')->nullable()->after('why_choose_us_title_fr');
            $table->text('why_choose_us_desc_de')->nullable()->after('why_choose_us_desc_fr');
            $table->string('meta_title_de')->nullable()->after('meta_title_fr');
            $table->string('meta_keywords_de')->nullable()->after('meta_keywords_fr');
            $table->string('meta_desc_de')->nullable()->after('meta_desc_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_update', function (Blueprint $table) {
            $table->dropColumn([
                'main_title_en', 'main_title_fr', 'main_title_de',
                'main_desc_en', 'main_desc_fr', 'main_desc_de',
                'journey_title_en', 'journey_title_fr', 'journey_title_de',
                'journey_desc_en', 'journey_desc_fr', 'journey_desc_de',
                'core_values_title_en', 'core_values_title_fr', 'core_values_title_de',
                'core_values_desc_en', 'core_values_desc_fr', 'core_values_desc_de',
                'why_choose_us_title_en', 'why_choose_us_title_fr', 'why_choose_us_title_de',
                'why_choose_us_desc_en', 'why_choose_us_desc_fr', 'why_choose_us_desc_de',
                'meta_title_en', 'meta_title_fr', 'meta_title_de',
                'meta_keywords_en', 'meta_keywords_fr', 'meta_keywords_de',
                'meta_desc_en', 'meta_desc_fr', 'meta_desc_de',
            ]);
        });
    }
};
