<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusans extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
    ];

    public function kelas()
    {
        return $this->hasMany(kelas::class);
    }

    public function siswa()
    {
        return $this->hasMany(siswa::class, 'jurusan_id');
    }
}
