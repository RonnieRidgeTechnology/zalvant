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
        Schema::create('home_updates', function (Blueprint $table) {
            $table->id();
             $table->string('main_title')->nullable();
            $table->text('main_desc')->nullable();

            $table->string('offer_title')->nullable();
            $table->text('offer_desc')->nullable();

            $table->string('real_stories_title')->nullable();
            $table->text('real_stories_desc')->nullable();

            $table->string('ai_section_title')->nullable();
            $table->text('ai_section_desc')->nullable();

            $table->string('technology_section_title')->nullable();
            $table->text('technology_section_desc')->nullable();

            $table->string('generative_ai_excellence_title')->nullable();
            $table->text('generative_ai_excellence_desc')->nullable();

            $table->string('portfolio_section_title')->nullable();
            $table->text('portfolio_section_desc')->nullable();

            $table->string('faq_section_title')->nullable();
            $table->text('faq_section_desc')->nullable();

            $table->string('any_question_title')->nullable();
            $table->text('any_question_desc')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->string('meta_keyword')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_updates');
    }
};
