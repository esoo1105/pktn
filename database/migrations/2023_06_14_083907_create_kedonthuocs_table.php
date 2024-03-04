<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kedonthuocs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_doctor');
            $table->unsignedInteger('id_patient');
            $table->unsignedInteger('id_medicinetype');
            $table->unsignedInteger('id_medicine');
            $table->integer('soluongthuoc');
            $table->string('lieuluong');
            $table->dateTime('lichhen');
            $table->timestamps();
            $table
                ->foreign('id_doctor')
                ->references('id')
                ->on('bacsis')
                ->onDelete('cascade');
            $table
                ->foreign('id_patient')
                ->references('id')
                ->on('benhnhans')
                ->onDelete('cascade');
            $table
                ->foreign('id_medicinetype')
                ->references('id')
                ->on('nhomthuocs')
                ->onDelete('cascade');
            $table
                ->foreign('id_medicine')
                ->references('id')
                ->on('thuocs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kedonthuocs');
    }
};
