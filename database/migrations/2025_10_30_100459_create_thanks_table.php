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
        Schema::create('thanks', function (Blueprint $table) {
            $table->id();
            $table->string('thank_title')->nullable();
            $table->text('thank_subtitle')->nullable();
            $table->string('chip_1')->nullable();
            $table->string('chip_2')->nullable();
            $table->string('chip_3')->nullable();
            $table->string('button_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanks');
    }
};
