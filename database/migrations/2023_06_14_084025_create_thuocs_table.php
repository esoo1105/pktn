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
        Schema::create('thuocs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lothuoc');
            $table->string('name');
            $table->date('ngaynhap')->nullable();
            $table->float('dongia');
            $table->string('dangbaoche')->nullable();
            $table->string('tennhacungcap')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thuocs');
    }
};
