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
        Schema::table('thanks', function (Blueprint $table) {
            // English translations
            if (!Schema::hasColumn('thanks', 'thank_title_en')) $table->string('thank_title_en')->nullable();
            if (!Schema::hasColumn('thanks', 'thank_subtitle_en')) $table->text('thank_subtitle_en')->nullable();
            if (!Schema::hasColumn('thanks', 'chip_1_en')) $table->string('chip_1_en')->nullable();
            if (!Schema::hasColumn('thanks', 'chip_2_en')) $table->string('chip_2_en')->nullable();
            if (!Schema::hasColumn('thanks', 'chip_3_en')) $table->string('chip_3_en')->nullable();
            if (!Schema::hasColumn('thanks', 'button_text_en')) $table->string('button_text_en')->nullable();
            
            // French translations
            if (!Schema::hasColumn('thanks', 'thank_title_fr')) $table->string('thank_title_fr')->nullable();
            if (!Schema::hasColumn('thanks', 'thank_subtitle_fr')) $table->text('thank_subtitle_fr')->nullable();
            if (!Schema::hasColumn('thanks', 'chip_1_fr')) $table->string('chip_1_fr')->nullable();
            if (!Schema::hasColumn('thanks', 'chip_2_fr')) $table->string('chip_2_fr')->nullable();
            if (!Schema::hasColumn('thanks', 'chip_3_fr')) $table->string('chip_3_fr')->nullable();
            if (!Schema::hasColumn('thanks', 'button_text_fr')) $table->string('button_text_fr')->nullable();
            
            // German translations
            if (!Schema::hasColumn('thanks', 'thank_title_de')) $table->string('thank_title_de')->nullable();
            if (!Schema::hasColumn('thanks', 'thank_subtitle_de')) $table->text('thank_subtitle_de')->nullable();
            if (!Schema::hasColumn('thanks', 'chip_1_de')) $table->string('chip_1_de')->nullable();
            if (!Schema::hasColumn('thanks', 'chip_2_de')) $table->string('chip_2_de')->nullable();
            if (!Schema::hasColumn('thanks', 'chip_3_de')) $table->string('chip_3_de')->nullable();
            if (!Schema::hasColumn('thanks', 'button_text_de')) $table->string('button_text_de')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('thanks', function (Blueprint $table) {
            // Drop each column only if it exists
            if (Schema::hasColumn('thanks', 'thank_title_en')) $table->dropColumn('thank_title_en');
            if (Schema::hasColumn('thanks', 'thank_subtitle_en')) $table->dropColumn('thank_subtitle_en');
            if (Schema::hasColumn('thanks', 'chip_1_en')) $table->dropColumn('chip_1_en');
            if (Schema::hasColumn('thanks', 'chip_2_en')) $table->dropColumn('chip_2_en');
            if (Schema::hasColumn('thanks', 'chip_3_en')) $table->dropColumn('chip_3_en');
            if (Schema::hasColumn('thanks', 'button_text_en')) $table->dropColumn('button_text_en');

            if (Schema::hasColumn('thanks', 'thank_title_fr')) $table->dropColumn('thank_title_fr');
            if (Schema::hasColumn('thanks', 'thank_subtitle_fr')) $table->dropColumn('thank_subtitle_fr');
            if (Schema::hasColumn('thanks', 'chip_1_fr')) $table->dropColumn('chip_1_fr');
            if (Schema::hasColumn('thanks', 'chip_2_fr')) $table->dropColumn('chip_2_fr');
            if (Schema::hasColumn('thanks', 'chip_3_fr')) $table->dropColumn('chip_3_fr');
            if (Schema::hasColumn('thanks', 'button_text_fr')) $table->dropColumn('button_text_fr');

            if (Schema::hasColumn('thanks', 'thank_title_de')) $table->dropColumn('thank_title_de');
            if (Schema::hasColumn('thanks', 'thank_subtitle_de')) $table->dropColumn('thank_subtitle_de');
            if (Schema::hasColumn('thanks', 'chip_1_de')) $table->dropColumn('chip_1_de');
            if (Schema::hasColumn('thanks', 'chip_2_de')) $table->dropColumn('chip_2_de');
            if (Schema::hasColumn('thanks', 'chip_3_de')) $table->dropColumn('chip_3_de');
            if (Schema::hasColumn('thanks', 'button_text_de')) $table->dropColumn('button_text_de');
        });
    }
};
