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
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->string('id_armada')->nullable();
            $table->string('id_status')->nullable();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('alamat_penjemputan');
            $table->string('alamat_tujuan');
            $table->string('tanggal_jam');
            $table->string('jumlah_penumpang');
            $table->string('no_whatsapp');
            $table->string('barang')->nullable();
            $table->string('tarif')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
