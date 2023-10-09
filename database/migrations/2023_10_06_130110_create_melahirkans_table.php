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
        Schema::create('melahirkans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->unsignedBigInteger('data_kk_id')->nullable();
            $table->foreign('data_kk_id')->references('id')->on('datakks')->onUpdate('restrict')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('melahirkans');
    }
};
