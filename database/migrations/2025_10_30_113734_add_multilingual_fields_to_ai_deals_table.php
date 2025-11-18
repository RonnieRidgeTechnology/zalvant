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
        Schema::table('ai_deals', function (Blueprint $table) {
            // English translations
            $table->string('name_en')->nullable()->after('name');
            $table->longText('desc_en')->nullable()->after('desc');
            
            // French translations
            $table->string('name_fr')->nullable()->after('name_en');
            $table->longText('desc_fr')->nullable()->after('desc_en');
            
            // German translations
            $table->string('name_de')->nullable()->after('name_fr');
            $table->longText('desc_de')->nullable()->after('desc_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ai_deals', function (Blueprint $table) {
            $table->dropColumn([
                'name_en', 'desc_en',
                'name_fr', 'desc_fr',
                'name_de', 'desc_de'
            ]);
        });
    }
};
