<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Surat;
use App\Models\Lampiran;

class Pengajuan extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'jenis_surat_id', 'status', 'keperluan', 'keterangan'];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'pengajuan_id');
        return $this->hasMany(Lampiran::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'jenis_surat_id');
    }

    public function lampiran()
    {
        return $this->hasMany(Lampiran::class, 'pengajuan_id');
    }
}
