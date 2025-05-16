<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangtuaProfile extends Model
{
    use HasFactory;

    protected $table = 'orangtua_profiles';

    protected $fillable = [
        'masyarakat_user_id',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'kewarganegaraan',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'nomor_ktp',
        'alamat',
        'pendidikan',
        'penghasilan',
    ];

    public function masyarakat()
    {
        return $this->belongsTo(MasyarakatProfile::class, 'masyarakat_user_id', 'user_id');
    }
}
