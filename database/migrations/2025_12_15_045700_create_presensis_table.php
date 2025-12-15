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
    Schema::create('presensis', function (Blueprint $table) {
        $table->id();
        // Menghubungkan dengan id kegiatan
        $table->foreignId('kegiatan_id')->constrained('kegiatans')->onDelete('cascade');
        $table->string('nama_anggota'); // Nama orang yang hadir
        $table->enum('status', ['Hadir', 'Izin', 'Sakit', 'Alpha']); // Status kehadiran
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensis');
    }
};
