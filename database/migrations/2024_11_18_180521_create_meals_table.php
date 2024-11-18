<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->integer('price');

            // Adding health conditions columns
            $table->boolean('diabetes')->default(false);
            $table->boolean('hypertension')->default(false);
            $table->boolean('heart_disease')->default(false);
            $table->boolean('asthma')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('meals');
    }
};
