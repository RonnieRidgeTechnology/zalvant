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
        Schema::table('websettings', function (Blueprint $table) {
            $table->string('available_languages')->default('nl,en,fr,de')->after('copyright');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('websettings', function (Blueprint $table) {
            $table->dropColumn('available_languages');
        });
    }
};
