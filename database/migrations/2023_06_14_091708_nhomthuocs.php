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
        Schema::create('nhomthuocs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_medicine');
            $table->string('name');
            $table->timestamps();
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
        Schema::dropIfExists('nhomthuocs');
    }
};
