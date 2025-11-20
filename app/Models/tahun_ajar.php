<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tahun_ajar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_tahun_ajar',
        'nama_tahun_ajar',
    ];

    public function siswas()
    {
        return $this->hasMany(siswa::class, );
    }

    public function kelas_details()
    {
        return $this->hasMany(kelas_detail::class, );
    }
}
