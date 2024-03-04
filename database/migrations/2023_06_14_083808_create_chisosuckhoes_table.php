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
        Schema::create('chisosuckhoes', function (Blueprint $table) {
            $table->unsignedInteger('id_patient');
            $table->string('huyetap');
            $table->string('nhiptim');
            $table->string('cannang');
            $table->string('chieucao');
            $table->string('nhietdo');
            $table->dateTime('ngaydo');
            $table
                ->foreign('id_patient')
                ->references('id')
                ->on('benhnhans')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chisosuckhoes');
    }
};
