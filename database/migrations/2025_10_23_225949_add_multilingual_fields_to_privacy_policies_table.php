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
        Schema::table('privacy_policies', function (Blueprint $table) {
            // English fields
            $table->string('title_en')->nullable()->after('title');
            $table->text('description_en')->nullable()->after('description');
            $table->string('meta_title_en')->nullable()->after('meta_title');
            $table->text('meta_description_en')->nullable()->after('meta_description');
            $table->text('meta_keywords_en')->nullable()->after('meta_keywords');
            
            // French fields
            $table->string('title_fr')->nullable()->after('title_en');
            $table->text('description_fr')->nullable()->after('description_en');
            $table->string('meta_title_fr')->nullable()->after('meta_title_en');
            $table->text('meta_description_fr')->nullable()->after('meta_description_en');
            $table->text('meta_keywords_fr')->nullable()->after('meta_keywords_en');
            
            // German fields
            $table->string('title_de')->nullable()->after('title_fr');
            $table->text('description_de')->nullable()->after('description_fr');
            $table->string('meta_title_de')->nullable()->after('meta_title_fr');
            $table->text('meta_description_de')->nullable()->after('meta_description_fr');
            $table->text('meta_keywords_de')->nullable()->after('meta_keywords_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('privacy_policies', function (Blueprint $table) {
            $table->dropColumn([
                'title_en', 'description_en', 'meta_title_en', 'meta_description_en', 'meta_keywords_en',
                'title_fr', 'description_fr', 'meta_title_fr', 'meta_description_fr', 'meta_keywords_fr',
                'title_de', 'description_de', 'meta_title_de', 'meta_description_de', 'meta_keywords_de',
            ]);
        });
    }
};
