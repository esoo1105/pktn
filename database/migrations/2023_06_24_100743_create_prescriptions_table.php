<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_doctor');
            $table->string('ten_patient');
            $table->dateTime('ngaykham');
            $table->dateTime('hentaikham');
            $table->timestamps();

        
        });
    }

    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
}
