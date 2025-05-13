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
        Schema::create('apars', function (Blueprint $table) {
            $table->id();
            $table->string('kode_apar');
            $table->unsignedBigInteger('id_merk');
            $table->unsignedBigInteger('id_tipe');
            $table->unsignedBigInteger('id_lokasi');
            $table->integer('berat');
            $table->date('tanggal_pembelian');
            $table->timestamps();

            $table->foreign('id_merk')->references('id')->on('merks')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_tipe')->references('id')->on('tipe_apars')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_lokasi')->references('id')->on('lokasis')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apars');
    }
};
