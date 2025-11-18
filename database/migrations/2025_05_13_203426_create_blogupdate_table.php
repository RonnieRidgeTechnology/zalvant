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
        Schema::create('blogupdate', function (Blueprint $table) {
            $table->id();
            $table->string('main_title')->nullable(); // Main Title
            $table->text('main_desc')->nullable(); // Main Description
            $table->string('meta_title')->nullable(); // Meta Title
            $table->text('meta_desc')->nullable(); // Meta Description
            $table->string('meta_keywords')->nullable(); // Meta Keywords
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogupdate');
    }
};
