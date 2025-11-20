<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
   use HasFactory;

   protected $fillable = [
        'nama_kelas',
       'level_kelas',
       'jurusan_id',
   ];

   public function jurusan()
   {
       return $this->belongsTo(jurusans::class);
   }
   
   public function siswas()
   {
       return $this->hasMany(siswa::class);
   }
   public function kelas_details()
   {
       return $this->hasMany(kelas_detail::class);
   }
}