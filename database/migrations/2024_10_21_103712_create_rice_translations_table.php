<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('rice_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rice_id');
            $table->foreign('rice_id')->references('id')->on('rices')->onDelete('cascade');
            $table->string('locale');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rice_translations');
    }
};
