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
        Schema::table('actions', function (Blueprint $table) {
            // English translations
            $table->string('eyebrow_en')->nullable()->after('eyebrow');
            $table->string('heading_en')->nullable()->after('heading');
            $table->text('sub_text_en')->nullable()->after('sub_text');
            $table->string('chip_one_en')->nullable()->after('chip_one');
            $table->string('chip_two_en')->nullable()->after('chip_two');
            $table->string('chip_three_en')->nullable()->after('chip_three');
            $table->string('footer_note_en')->nullable()->after('footer_note');
            
            // French translations
            $table->string('eyebrow_fr')->nullable()->after('eyebrow_en');
            $table->string('heading_fr')->nullable()->after('heading_en');
            $table->text('sub_text_fr')->nullable()->after('sub_text_en');
            $table->string('chip_one_fr')->nullable()->after('chip_one_en');
            $table->string('chip_two_fr')->nullable()->after('chip_two_en');
            $table->string('chip_three_fr')->nullable()->after('chip_three_en');
            $table->string('footer_note_fr')->nullable()->after('footer_note_en');
            
            // German translations
            $table->string('eyebrow_de')->nullable()->after('eyebrow_fr');
            $table->string('heading_de')->nullable()->after('heading_fr');
            $table->text('sub_text_de')->nullable()->after('sub_text_fr');
            $table->string('chip_one_de')->nullable()->after('chip_one_fr');
            $table->string('chip_two_de')->nullable()->after('chip_two_fr');
            $table->string('chip_three_de')->nullable()->after('chip_three_fr');
            $table->string('footer_note_de')->nullable()->after('footer_note_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->dropColumn([
                'eyebrow_en', 'heading_en', 'sub_text_en', 'chip_one_en', 'chip_two_en', 'chip_three_en', 'footer_note_en',
                'eyebrow_fr', 'heading_fr', 'sub_text_fr', 'chip_one_fr', 'chip_two_fr', 'chip_three_fr', 'footer_note_fr',
                'eyebrow_de', 'heading_de', 'sub_text_de', 'chip_one_de', 'chip_two_de', 'chip_three_de', 'footer_note_de'
            ]);
        });
    }
};
