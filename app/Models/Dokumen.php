<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumen';
    protected $fillable = ['nama_dokumen'];

    public function surat()
    {
        return $this->belongsToMany(Surat::class, 'jenis_surat_dokumen', 'dokumen_id', 'jenis_surat_id');
    }
}

