<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasyarakatProfile extends Model
{
    use HasFactory;

    protected $table = 'masyarakat_profiles';

    protected $fillable = [
        'user_id',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nik',
        'sekolah',
        'semester',
        'status_perkawinan',
        'pendidikan',
        'pekerjaan',
        'kewarganegaraan',
        'agama',
        'nim',
        'umur',
        'nis',
        'alamat',
        'no_hp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orangtua()
    {
        return $this->hasOne(OrangtuaProfile::class, 'masyarakat_user_id', 'user_id');
    }
}
