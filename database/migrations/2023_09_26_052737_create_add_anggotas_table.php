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
        Schema::create('add_anggotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kk_id')->nullable();
            $table->foreign('kk_id')->references('id')->on('datakks')->onUpdate('restrict')->onDelete('restrict');
            $table->unsignedBigInteger('anggota_id')->nullable();
            $table->foreign('anggota_id')->references('id')->on('data_penduduks')->onUpdate('restrict')->onDelete('restrict');
            $table->enum('hub_keluarga', ['kepala_keluarga', 'ibu_rumah_tangga', 'anak', 'istri', 'ayah'])->default('anak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_anggotas');
    }
};
