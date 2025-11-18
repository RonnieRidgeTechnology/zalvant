<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string('eyebrow')->nullable();
            $table->string('heading')->nullable();
            $table->text('sub_text')->nullable();
            $table->string('chip_one')->nullable();
            $table->string('chip_two')->nullable();
            $table->string('chip_three')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('footer_note')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hero_actions');
    }
};
