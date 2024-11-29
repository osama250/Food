<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('dietplan_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dietplan_id')->constrained('dietplans')->onDelete('cascade');
            $table->string('locale');
            $table->string('name');
            $table->longText('description');
            $table->unique(['dietplan_id', 'locale']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dietplan_translations');
    }
};
