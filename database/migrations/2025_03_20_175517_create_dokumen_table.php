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
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokumen')->unique();
            $table->timestamps();
        });

        // Buat tabel pivot untuk relasi many-to-many dengan jenis_surat
        Schema::create('jenis_surat_dokumen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_surat_id')->constrained('surat')->onDelete('cascade');
            $table->foreignId('dokumen_id')->constrained('dokumen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_surat_dokumen');
        Schema::dropIfExists('dokumen');
    }
};
