<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('client_meal_customizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_meal_id')->constrained('client_meals')->onDelete('cascade');
            $table->foreignId('rice_id')->nullable()->constrained('rices')->onDelete('set null');
            $table->foreignId('bread_id')->nullable()->constrained('breads')->onDelete('set null');
            $table->foreignId('salad_id')->nullable()->constrained('salads')->onDelete('set null');
            $table->foreignId('drink_id')->nullable()->constrained('drinks')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('client_meal_customizations');
    }
};
