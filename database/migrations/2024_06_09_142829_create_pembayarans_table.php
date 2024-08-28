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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran')->primary();
            $table->foreignId('id_petugas')->constrained(
                table: 'petugas', column: 'id_petugas'
            );
            $table->foreignId('nisn')->constrained(
                table: 'siswas', column: 'nisn'
            );
            $table->foreignId('id_spp')->constrained(
                table: 'spps', column: 'id_spp'
            );
            $table->date('tgl_bayar');
            $table->string('bulan_dibayar');
            $table->string('tahun_dibayar');
            $table->integer('jumlah_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
