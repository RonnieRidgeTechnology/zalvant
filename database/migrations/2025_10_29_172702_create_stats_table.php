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
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->string('happy_clients')->nullable();
            $table->string('client_label')->default('Happy Clients');

            $table->string('tours_completed')->nullable();
            $table->string('completed_label')->default('Tours Completed');

            $table->string('awards')->nullable();
            $table->string('awards_label')->default('Awards Won');

            $table->string('experience_years')->nullable();
            $table->string('experience_label')->default('Years of Experience');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
