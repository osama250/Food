<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('suggestions', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->text('suggestion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('suggestions');
    }
};
