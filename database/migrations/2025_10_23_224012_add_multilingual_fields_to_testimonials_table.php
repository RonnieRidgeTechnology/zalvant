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
        Schema::table('testimonials', function (Blueprint $table) {
            // English fields
            $table->string('name_en')->nullable()->after('name');
            $table->text('message_en')->nullable()->after('message');
            
            // French fields
            $table->string('name_fr')->nullable()->after('name_en');
            $table->text('message_fr')->nullable()->after('message_en');
            
            // German fields
            $table->string('name_de')->nullable()->after('name_fr');
            $table->text('message_de')->nullable()->after('message_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn([
                'name_en', 'message_en',
                'name_fr', 'message_fr',
                'name_de', 'message_de',
            ]);
        });
    }
};
