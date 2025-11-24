<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'jurusan_id',
        'kelas_id',
        'tahun_ajar_id',
    ];

         protected $casts = [
        'tanggal_lahir' => 'date',      
    ];

    public function jurusan()
    {
        return $this->belongsTo(jurusans::class);
    }

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }

    public function tahun_ajar()
    {
        return $this->belongsTo(tahun_ajar::class);
    }

   public function kelas_details()
    {
        return $this->hasMany(kelas_detail::class);
    }
}
