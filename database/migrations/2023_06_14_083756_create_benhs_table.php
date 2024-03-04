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
        Schema::create('benhs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_patient');
            $table->string('benh')->nullable();
            $table->string('trieuchung')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('benhs');
    }
};
