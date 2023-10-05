<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('datakks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('no_kk');
            $table->unsignedBigInteger('kepala_keluarga_id')->nullable();
            $table->foreign('kepala_keluarga_id')->references('id')->on('data_penduduks')->onUpdate('restrict')->onDelete('restrict');
            $table->string('rt');
            $table->string('rw');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datakks');
    }
};
