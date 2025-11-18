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
        Schema::table('websettings', function (Blueprint $table) {
            // English translations
            $table->string('address_en')->nullable()->after('address');
            $table->string('copyright_en')->nullable()->after('copyright');
            $table->text('footer_desc_en')->nullable()->after('footer_desc');
            
            // French translations
            $table->string('address_fr')->nullable()->after('address_en');
            $table->string('copyright_fr')->nullable()->after('copyright_en');
            $table->text('footer_desc_fr')->nullable()->after('footer_desc_en');
            
            // German translations
            $table->string('address_de')->nullable()->after('address_fr');
            $table->string('copyright_de')->nullable()->after('copyright_fr');
            $table->text('footer_desc_de')->nullable()->after('footer_desc_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('websettings', function (Blueprint $table) {
            $table->dropColumn([
                'address_en', 'address_fr', 'address_de',
                'copyright_en', 'copyright_fr', 'copyright_de',
                'footer_desc_en', 'footer_desc_fr', 'footer_desc_de'
            ]);
        });
    }
};
