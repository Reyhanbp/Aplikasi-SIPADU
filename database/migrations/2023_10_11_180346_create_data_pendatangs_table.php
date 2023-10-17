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
        Schema::create('data_pendatangs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('NIK');
            $table->string('name');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->date('tgl_datang');
            $table->unsignedBigInteger('pelapor_id')->nullable();
            $table->foreign('pelapor_id')->references('id')->on('data_penduduks')->onUpdate('restrict')->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pendatangs');
    }
};
