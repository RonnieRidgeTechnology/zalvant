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
        Schema::table('contact_updates', function (Blueprint $table) {
            // English translations
            $table->string('name_en')->nullable()->after('name');
            $table->string('desc_en')->nullable()->after('desc');
            $table->string('meta_title_en')->nullable()->after('meta_title');
            $table->text('meta_description_en')->nullable()->after('meta_description');
            $table->string('meta_keywords_en')->nullable()->after('meta_keywords');
            
            // French translations
            $table->string('name_fr')->nullable()->after('name_en');
            $table->string('desc_fr')->nullable()->after('desc_en');
            $table->string('meta_title_fr')->nullable()->after('meta_title_en');
            $table->text('meta_description_fr')->nullable()->after('meta_description_en');
            $table->string('meta_keywords_fr')->nullable()->after('meta_keywords_en');
            
            // German translations
            $table->string('name_de')->nullable()->after('name_fr');
            $table->string('desc_de')->nullable()->after('desc_fr');
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
        Schema::table('contact_updates', function (Blueprint $table) {
            $table->dropColumn([
                'name_en', 'name_fr', 'name_de',
                'desc_en', 'desc_fr', 'desc_de',
                'meta_title_en', 'meta_title_fr', 'meta_title_de',
                'meta_description_en', 'meta_description_fr', 'meta_description_de',
                'meta_keywords_en', 'meta_keywords_fr', 'meta_keywords_de',
            ]);
        });
    }
};
