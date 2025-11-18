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
        Schema::table('blog_categories', function (Blueprint $table) {
            // English
            $table->string('title_en')->nullable()->after('title');
            
            // French
            $table->string('title_fr')->nullable()->after('title_en');
            
            // German
            $table->string('title_de')->nullable()->after('title_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_categories', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'title_fr', 'title_de']);
        });
    }
};
