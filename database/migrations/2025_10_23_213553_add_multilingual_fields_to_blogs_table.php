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
        Schema::table('blogs', function (Blueprint $table) {
            // English fields
            $table->string('title_en')->nullable()->after('title');
            $table->text('desc_en')->nullable()->after('desc');
            $table->string('meta_title_en')->nullable()->after('meta_title');
            $table->text('meta_desc_en')->nullable()->after('meta_desc');
            $table->text('meta_keyword_en')->nullable()->after('meta_keyword');
            
            // French fields
            $table->string('title_fr')->nullable()->after('title_en');
            $table->text('desc_fr')->nullable()->after('desc_en');
            $table->string('meta_title_fr')->nullable()->after('meta_title_en');
            $table->text('meta_desc_fr')->nullable()->after('meta_desc_en');
            $table->text('meta_keyword_fr')->nullable()->after('meta_keyword_en');
            
            // German fields
            $table->string('title_de')->nullable()->after('title_fr');
            $table->text('desc_de')->nullable()->after('desc_fr');
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
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn([
                'title_en', 'desc_en', 'meta_title_en', 'meta_desc_en', 'meta_keyword_en',
                'title_fr', 'desc_fr', 'meta_title_fr', 'meta_desc_fr', 'meta_keyword_fr',
                'title_de', 'desc_de', 'meta_title_de', 'meta_desc_de', 'meta_keyword_de',
            ]);
        });
    }
};
