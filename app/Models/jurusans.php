<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jurusans extends Model
{
    protected $fillables = [
        'kode_jurusan',
        'nama_jurusan',
    ];

    public function kelas()
    {
        return $this->hasMany(kelas::class, );
    }

  public function siswa()
    {
        return $this->hasMany(siswa::class, );
    }
}
