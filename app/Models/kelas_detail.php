<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'tahun_ajar_id',
        'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(siswa::class);
    }

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }

    public function tahun_ajar()
    {
        return $this->belongsTo(tahun_ajar::class);
    }

    
}
