<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_surat',
        'deskripsi_surat',
        'kategori',
    ];

    // public function pengajuan(): HasMany
    // {
    //     return $this->hasMany(Pengajuan::class);
    // }

    public function dokumen()
    {
        return $this->belongsToMany(Dokumen::class, 'jenis_surat_dokumen', 'jenis_surat_id', 'dokumen_id');
    }


    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class, 'jenis_surat_id');
    }

}
