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
        Schema::create('phieuthanhtoans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_nurse');
            $table->unsignedInteger('id_patient');
            $table->date('ngaythang');
            $table->float('sotien');
            $table->boolean('bhyt')->nullable();
            $table->boolean('dichvu')->nullable();
            $table->float('tongtien');
            $table->float('qr');
            $table->timestamps();
            $table
                ->foreign('id_nurse')
                ->references('id')
                ->on('ytas')
                ->onDelete('cascade');
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
        Schema::dropIfExists('phieuthanhtoans');
    }
};
