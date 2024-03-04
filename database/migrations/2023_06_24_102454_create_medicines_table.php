<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            
            $table->unsignedInteger('prescription_id');
            $table->string('tenthuoc');
            $table->string('donvi');
            $table->integer('soluong');
            $table->float('gia');
            $table->string('cachdung');
            $table->float('thanhtien');
            $table->timestamps();

            $table->foreign('prescription_id')->references('id')->on('prescriptions');
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
