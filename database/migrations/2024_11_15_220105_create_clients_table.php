<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('address');
            $table->integer('age');
            $table->integer('weight');
            $table->enum('gender' , ['male' , 'female'] )->nullable();
            $table->string('image')->nullable();

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
        Schema::dropIfExists('clients');
    }
};
