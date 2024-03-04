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
        Schema::create('phieudangkys', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_patient');
            $table->unsignedInteger('id_procedure');
            $table->integer('stt');
            $table->string('name');
            $table->dateTime('lichkham');
            $table->timestamps();
            $table
                ->foreign('id_patient')
                ->references('id')
                ->on('benhnhans')
                ->onDelete('cascade');
            $table
                ->foreign('id_procedure')
                ->references('id')
                ->on('phuongthuckhams')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieudangkys');
    }
};
