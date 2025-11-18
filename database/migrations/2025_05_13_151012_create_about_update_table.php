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
        Schema::create('about_update', function (Blueprint $table) {
            $table->id();
            $table->string('main_title')->nullable();
            $table->text('main_desc')->nullable();
            $table->string('journey_title')->nullable();
            $table->text('journey_desc')->nullable();
            $table->integer('satisfied_clients')->nullable();
            $table->integer('finished_projects')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->integer('skilled_experts')->nullable();
            $table->string('core_values_title')->nullable();
            $table->text('core_values_desc')->nullable();
            $table->string('why_choose_us_title')->nullable();
            $table->text('why_choose_us_desc')->nullable();
            $table->string('have_you_any_question_title')->nullable();
            $table->text('have_you_any_question_desc')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_update');
    }
};
