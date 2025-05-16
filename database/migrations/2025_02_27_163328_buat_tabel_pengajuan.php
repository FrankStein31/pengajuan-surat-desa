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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id')->constrained('profil')->onDelete('cascade');
            $table->foreignId('surat_id')->constrained('surat')->onDelete('cascade');
            $table->dateTime('tanggal_pengajuan');
            $table->dateTime('tanggal_selesai')->nullable();
            $table->enum('status_pengajuan', ['diproses', 'disetujui', 'ditolak']);
            $table->string('file_dokumen', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
