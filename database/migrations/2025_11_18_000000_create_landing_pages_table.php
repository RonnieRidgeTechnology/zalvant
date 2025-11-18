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
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();

            // Section 1
            $table->string('header_title')->nullable();
            $table->string('header_title_en')->nullable();
            $table->string('header_title_fr')->nullable();
            $table->string('header_title_de')->nullable();

            $table->text('header_desc')->nullable();
            $table->text('header_desc_en')->nullable();
            $table->text('header_desc_fr')->nullable();
            $table->text('header_desc_de')->nullable();

            // Section 2
            $table->string('second_title')->nullable();
            $table->string('second_title_en')->nullable();
            $table->string('second_title_fr')->nullable();
            $table->string('second_title_de')->nullable();

            $table->text('second_desc')->nullable();
            $table->text('second_desc_en')->nullable();
            $table->text('second_desc_fr')->nullable();
            $table->text('second_desc_de')->nullable();

            // Media
            $table->string('file')->nullable();

            // Section 3
            $table->string('third_title')->nullable();
            $table->string('third_title_en')->nullable();
            $table->string('third_title_fr')->nullable();
            $table->string('third_title_de')->nullable();

            $table->text('third_desc')->nullable();
            $table->text('third_desc_en')->nullable();
            $table->text('third_desc_fr')->nullable();
            $table->text('third_desc_de')->nullable();

            // Feature blocks (JSON array with icon/title/description per locale)
            $table->json('feature_blocks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_pages');
    }
};

