<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('meal_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_id')->constrained()->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('name');
            $table->longText('description');
            $table->unique(['meal_id', 'locale']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meal_translations');
    }
};
