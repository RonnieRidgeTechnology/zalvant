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
        Schema::table('portfolios', function (Blueprint $table) {
            // English fields
            $table->string('main_title_en')->nullable()->after('main_title');
            $table->longText('main_description_en')->nullable()->after('main_description');
            $table->string('meta_title_en')->nullable()->after('meta_title');
            $table->longText('meta_description_en')->nullable()->after('meta_description');
            $table->text('meta_keywords_en')->nullable()->after('meta_keywords');
            
            // French fields
            $table->string('main_title_fr')->nullable()->after('main_title_en');
            $table->longText('main_description_fr')->nullable()->after('main_description_en');
            $table->string('meta_title_fr')->nullable()->after('meta_title_en');
            $table->longText('meta_description_fr')->nullable()->after('meta_description_en');
            $table->text('meta_keywords_fr')->nullable()->after('meta_keywords_en');
            
            // German fields
            $table->string('main_title_de')->nullable()->after('main_title_fr');
            $table->longText('main_description_de')->nullable()->after('main_description_fr');
            $table->string('meta_title_de')->nullable()->after('meta_title_fr');
            $table->longText('meta_description_de')->nullable()->after('meta_description_fr');
            $table->text('meta_keywords_de')->nullable()->after('meta_keywords_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn([
                'main_title_en', 'main_description_en', 'meta_title_en', 'meta_description_en', 'meta_keywords_en',
                'main_title_fr', 'main_description_fr', 'meta_title_fr', 'meta_description_fr', 'meta_keywords_fr',
                'main_title_de', 'main_description_de', 'meta_title_de', 'meta_description_de', 'meta_keywords_de',
            ]);
        });
    }
};
