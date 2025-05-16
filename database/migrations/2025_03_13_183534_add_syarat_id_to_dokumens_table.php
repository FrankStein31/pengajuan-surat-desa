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
        Schema::table('dokumens', function (Blueprint $table) {
            $table->unsignedBigInteger('syarat_id')->nullable()->after('nama_file');
            $table->foreign('syarat_id')->references('id')->on('dokumens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokumens', function (Blueprint $table) {
            $table->dropForeign(['syarat_id']);
            $table->dropColumn('syarat_id');
        });
    }
};
