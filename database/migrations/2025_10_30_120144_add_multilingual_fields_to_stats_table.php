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
        Schema::table('stats', function (Blueprint $table) {
            // English translations for labels only
            $table->string('client_label_en')->nullable()->after('client_label');
            $table->string('completed_label_en')->nullable()->after('completed_label');
            $table->string('awards_label_en')->nullable()->after('awards_label');
            $table->string('experience_label_en')->nullable()->after('experience_label');
            
            // French translations for labels only
            $table->string('client_label_fr')->nullable()->after('client_label_en');
            $table->string('completed_label_fr')->nullable()->after('completed_label_en');
            $table->string('awards_label_fr')->nullable()->after('awards_label_en');
            $table->string('experience_label_fr')->nullable()->after('experience_label_en');
            
            // German translations for labels only
            $table->string('client_label_de')->nullable()->after('client_label_fr');
            $table->string('completed_label_de')->nullable()->after('completed_label_fr');
            $table->string('awards_label_de')->nullable()->after('awards_label_fr');
            $table->string('experience_label_de')->nullable()->after('experience_label_fr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stats', function (Blueprint $table) {
            $table->dropColumn([
                'client_label_en', 'completed_label_en', 'awards_label_en', 'experience_label_en',
                'client_label_fr', 'completed_label_fr', 'awards_label_fr', 'experience_label_fr',
                'client_label_de', 'completed_label_de', 'awards_label_de', 'experience_label_de'
            ]);
        });
    }
};
