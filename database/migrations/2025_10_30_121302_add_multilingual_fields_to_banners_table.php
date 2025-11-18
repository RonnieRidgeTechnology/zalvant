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
        Schema::table('banners', function (Blueprint $table) {
            // English translations
            $table->string('banner_head_title_en')->nullable()->after('banner_head_title');
            $table->text('banner_head_para_en')->nullable()->after('banner_head_para');
            $table->string('banner_footer_title_en')->nullable()->after('banner_footer_title');
            $table->text('banner_footer_para_en')->nullable()->after('banner_footer_para');
            
            // French translations
            $table->string('banner_head_title_fr')->nullable()->after('banner_head_title_en');
            $table->text('banner_head_para_fr')->nullable()->after('banner_head_para_en');
            $table->string('banner_footer_title_fr')->nullable()->after('banner_footer_title_en');
            $table->text('banner_footer_para_fr')->nullable()->after('banner_footer_para_en');
            
            // German translations
            $table->string('banner_head_title_de')->nullable()->after('banner_head_title_fr');
            $table->text('banner_head_para_de')->nullable()->after('banner_head_para_fr');
            $table->string('banner_footer_title_de')->nullable()->after('banner_footer_title_fr');
            $table->text('banner_footer_para_de')->nullable()->after('banner_footer_para_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn([
                'banner_head_title_en', 'banner_head_para_en', 'banner_footer_title_en', 'banner_footer_para_en',
                'banner_head_title_fr', 'banner_head_para_fr', 'banner_footer_title_fr', 'banner_footer_para_fr',
                'banner_head_title_de', 'banner_head_para_de', 'banner_footer_title_de', 'banner_footer_para_de'
            ]);
        });
    }
};
