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
            $table->string('locale');
            $table->string('name');
            $table->longText('description');
            $table->foreignId('dietplan_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dietplan_translations');
    }
};
