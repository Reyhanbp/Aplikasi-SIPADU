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
        Schema::create('meninggals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_penduduk_id')->nullable();
            $table->foreign('data_penduduk_id')->references('id')->on('data_penduduks')->onUpdate('restrict')->onDelete('restrict');
            $table->date('tgl_meninggal');
            $table->string('sebab_meninggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meninggals');
    }
};
