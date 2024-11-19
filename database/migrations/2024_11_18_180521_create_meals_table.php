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

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('salad_id');
            $table->foreign('salad_id')->references('id')->on('salads')->onDelete('cascade');

            $table->unsignedBigInteger('rice_id');
            $table->foreign('rice_id')->references('id')->on('rices')->onDelete('cascade');

            $table->unsignedBigInteger('drink_id');
            $table->foreign('drink_id')->references('id')->on('drinks')->onDelete('cascade');

            $table->unsignedBigInteger('bread_id');
            $table->foreign('bread_id')->references('id')->on('breads')->onDelete('cascade');

            // Adding health conditions columns
            $table->boolean('diabetes')->default(false);
            $table->boolean('hypertension')->default(false);
            $table->boolean('heart_disease')->default(false);
            $table->boolean('asthma')->default(false);
            $table->boolean('cancer')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('meals');
    }
};
