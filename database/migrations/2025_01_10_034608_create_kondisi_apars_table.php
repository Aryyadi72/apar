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
        Schema::create('kondisi_apars', function (Blueprint $table) {
            $table->id();
            $table->integer('id_apar');
            $table->string('bulan');
            $table->enum('segel', ['B', 'TB']);
            $table->enum('jarum', ['B', 'TB']);
            $table->enum('tabung', ['B', 'TB']);
            $table->enum('selang', ['B', 'TB']);
            $table->enum('nozzle', ['B', 'TB']);
            $table->enum('judge', ['B', 'TB']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kondisi_apars');
    }
};
