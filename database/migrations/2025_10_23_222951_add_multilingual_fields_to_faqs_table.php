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
        Schema::table('faqs', function (Blueprint $table) {
            // English fields
            $table->text('question_en')->nullable()->after('question');
            $table->text('answer_en')->nullable()->after('answer');
            
            // French fields
            $table->text('question_fr')->nullable()->after('question_en');
            $table->text('answer_fr')->nullable()->after('answer_en');
            
            // German fields
            $table->text('question_de')->nullable()->after('question_fr');
            $table->text('answer_de')->nullable()->after('answer_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->dropColumn([
                'question_en', 'answer_en',
                'question_fr', 'answer_fr',
                'question_de', 'answer_de',
            ]);
        });
    }
};
