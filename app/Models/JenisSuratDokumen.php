<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSuratDokumen extends Model
{
    use HasFactory;

    protected $table = 'jenis_surat_dokumen'; // pastikan nama tabel sesuai
    public $timestamps = false; // karena tidak ada kolom created_at dan updated_at

    protected $fillable = ['jenis_surat_id', 'dokumen_id']; // opsional, jika ingin mass assignment

    /**
     * Relasi ke dokumen
     */
    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'dokumen_id');
    }

    /**
     * Relasi ke jenis surat (jika dibutuhkan)
     */
    public function jenisSurat()
    {
        return $this->belongsTo(Surat::class, 'jenis_surat_id');
    }
}
