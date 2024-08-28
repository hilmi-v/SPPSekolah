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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id('nisn')->primary();
            $table->string('nis', 15);
            $table->string('nama');
            $table->foreignId('id_kelas')->constrained(
                table : 'kelas', column: 'id_kelas'
            );
            $table->foreignId('id_spp')->constrained(
                table : 'spps', column: 'id_spp'
            );
            $table->text('alamat');
            $table->string('no_telp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
