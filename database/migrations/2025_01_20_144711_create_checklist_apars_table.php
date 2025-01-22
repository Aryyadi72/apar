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
        Schema::create('checklist_apars', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pengecekan');
            $table->integer('id_lokasi');
            $table->integer('id_apar');
            $table->string('kondisi_segel');
            $table->string('posisi_jarum');
            $table->string('kondisi_selang');
            $table->string('kondisi_tabung');
            $table->string('kondisi_air');
            $table->string('kondisi_karung');
            $table->string('kondisi_box');
            $table->string('lain_lain');
            $table->string('komentar');
            $table->string('approve_petugas');
            $table->string('approve_asst_sub_div');
            $table->string('approve_asst_dp');
            $table->string('approve_hse_dp');
            $table->string('approve_mng');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklist_apars');
    }
};
