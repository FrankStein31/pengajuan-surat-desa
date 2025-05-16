<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumen';
    protected $fillable = ['nama_dokumen', 'pengajuan_id'];

    public function surat()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id');
        return $this->belongsToMany(Surat::class, 'jenis_surat_dokumen', 'dokumen_id', 'jenis_surat_id');
    }
}

