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
        Schema::table('pengajuans', function (Blueprint $table) {
            $table->unsignedBigInteger('jenis_surat_id')->after('user_id');
            $table->foreign('jenis_surat_id')->references('id')->on('surat')->onDelete('cascade');

            $table->enum('status', ['pending', 'diproses', 'selesai'])->default('pending')->after('jenis_surat_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuans', function (Blueprint $table) {
            $table->dropForeign(['jenis_surat_id']);
            $table->dropColumn(['jenis_surat_id', 'status']);
        });
    }
};
