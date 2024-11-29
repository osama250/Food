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
            $table->enum('type', [
                'diabetes',
                'hypertension',
                'heart_disease',
                'asthma',
                'cancer',
                'weight_loss',
                'weight_gain'
            ]);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('dietplans');
    }
};
