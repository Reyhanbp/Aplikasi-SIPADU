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
        Schema::create('data_penduduks', function (Blueprint $table) {
            $table->id();
            $table->integer('NIK');
            $table->string('name');
            $table->string('tmpt_lahir');
            $table->date('tgl_lahir');
            $table->string('desa_kelurahan');
            $table->string('rt');
            $table->string('rw');
            $table->enum('agama', ['islam', 'kristen', 'katolik', 'hindu','buddha','khonghucu'])->default('islam');
            $table->string('pekerjaan');
            $table->string('file_foto');
            $table->enum('status', ['sudah nikah', 'belum nikah', 'cerai mati','cerai hidup'])->default('belum nikah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penduduks');
    }
};
