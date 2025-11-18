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
        Schema::create('landing_form_labels', function (Blueprint $table) {
            $table->id();
            
            // Dutch (default) labels
            $table->string('required_note')->nullable();
            $table->string('name_label')->nullable();
            $table->string('email_label')->nullable();
            $table->string('phone_label')->nullable();
            $table->string('service_label')->nullable();
            $table->string('message_label')->nullable();
            $table->string('name_placeholder')->nullable();
            $table->string('email_placeholder')->nullable();
            $table->string('phone_placeholder')->nullable();
            $table->string('service_placeholder')->nullable();
            $table->text('message_placeholder')->nullable();
            $table->string('submit_button')->nullable();
            $table->string('success_message')->nullable();
            
            // English translations
            $table->string('required_note_en')->nullable();
            $table->string('name_label_en')->nullable();
            $table->string('email_label_en')->nullable();
            $table->string('phone_label_en')->nullable();
            $table->string('service_label_en')->nullable();
            $table->string('message_label_en')->nullable();
            $table->string('name_placeholder_en')->nullable();
            $table->string('email_placeholder_en')->nullable();
            $table->string('phone_placeholder_en')->nullable();
            $table->string('service_placeholder_en')->nullable();
            $table->text('message_placeholder_en')->nullable();
            $table->string('submit_button_en')->nullable();
            $table->string('success_message_en')->nullable();
            
            // French translations
            $table->string('required_note_fr')->nullable();
            $table->string('name_label_fr')->nullable();
            $table->string('email_label_fr')->nullable();
            $table->string('phone_label_fr')->nullable();
            $table->string('service_label_fr')->nullable();
            $table->string('message_label_fr')->nullable();
            $table->string('name_placeholder_fr')->nullable();
            $table->string('email_placeholder_fr')->nullable();
            $table->string('phone_placeholder_fr')->nullable();
            $table->string('service_placeholder_fr')->nullable();
            $table->text('message_placeholder_fr')->nullable();
            $table->string('submit_button_fr')->nullable();
            $table->string('success_message_fr')->nullable();
            
            // German translations
            $table->string('required_note_de')->nullable();
            $table->string('name_label_de')->nullable();
            $table->string('email_label_de')->nullable();
            $table->string('phone_label_de')->nullable();
            $table->string('service_label_de')->nullable();
            $table->string('message_label_de')->nullable();
            $table->string('name_placeholder_de')->nullable();
            $table->string('email_placeholder_de')->nullable();
            $table->string('phone_placeholder_de')->nullable();
            $table->string('service_placeholder_de')->nullable();
            $table->text('message_placeholder_de')->nullable();
            $table->string('submit_button_de')->nullable();
            $table->string('success_message_de')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_form_labels');
    }
};
