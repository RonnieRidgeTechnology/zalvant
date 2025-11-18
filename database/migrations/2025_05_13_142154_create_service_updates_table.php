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
        Schema::create('service_updates', function (Blueprint $table) {
            $table->id();
            $table->string('main_title')->nullable();
            $table->text('main_desc')->nullable();
            $table->string('offer_title')->nullable();
            $table->text('offer_desc')->nullable();
            $table->string('technology_title')->nullable();
            $table->text('technology_desc')->nullable();
            $table->string('deal_ai_title')->nullable();
            $table->text('deal_ai_desc')->nullable();
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
        Schema::dropIfExists('service_updates');
    }
};
