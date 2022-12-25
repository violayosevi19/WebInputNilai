<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $guarded = [];
  
    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function guru(){
        return $this->belongsTo(Guru::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function daftar_pelajaran()
    {
        return $this->belongsToMany(DaftarPelajaran::class)->withPivot(['nilai']);
    }
}
