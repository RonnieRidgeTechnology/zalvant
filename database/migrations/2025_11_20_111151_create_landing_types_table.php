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
        Schema::create('landing_types', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->string('name_en')->nullable();
            $table->string('name_fr')->nullable();
            $table->string('name_de')->nullable();
            $table->integer('order')->nullable();
            $table->tinyInteger('status')->default(1);

            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_types');
    }
};
