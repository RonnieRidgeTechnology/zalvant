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
        Schema::table('blogupdate', function (Blueprint $table) {
            // English fields
            $table->string('main_title_en')->nullable()->after('main_title');
            $table->text('main_desc_en')->nullable()->after('main_desc');
            $table->string('meta_title_en')->nullable()->after('meta_title');
            $table->text('meta_desc_en')->nullable()->after('meta_desc');
            $table->string('meta_keywords_en')->nullable()->after('meta_keywords');
            
            // French fields
            $table->string('main_title_fr')->nullable()->after('main_title_en');
            $table->text('main_desc_fr')->nullable()->after('main_desc_en');
            $table->string('meta_title_fr')->nullable()->after('meta_title_en');
            $table->text('meta_desc_fr')->nullable()->after('meta_desc_en');
            $table->string('meta_keywords_fr')->nullable()->after('meta_keywords_en');
            
            // German fields
            $table->string('main_title_de')->nullable()->after('main_title_fr');
            $table->text('main_desc_de')->nullable()->after('main_desc_fr');
            $table->string('meta_title_de')->nullable()->after('meta_title_fr');
            $table->text('meta_desc_de')->nullable()->after('meta_desc_fr');
            $table->string('meta_keywords_de')->nullable()->after('meta_keywords_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogupdate', function (Blueprint $table) {
            $table->dropColumn([
                'main_title_en', 'main_desc_en', 'meta_title_en', 'meta_desc_en', 'meta_keywords_en',
                'main_title_fr', 'main_desc_fr', 'meta_title_fr', 'meta_desc_fr', 'meta_keywords_fr',
                'main_title_de', 'main_desc_de', 'meta_title_de', 'meta_desc_de', 'meta_keywords_de',
            ]);
        });
    }
};
