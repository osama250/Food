<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dietplans', function (Blueprint $table) {
            $table->id();
            $table->enum('disease', ['diabetes', 'hypertension', 'heart_disease', 'asthma', 'cancer'])->default('cancer');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('dietplans');
    }
};
