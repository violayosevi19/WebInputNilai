<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPelajaranSiswa extends Model
{
    use HasFactory;
    public $table = "daftar_pelajaran_siswa";
    protected $guarded= [];
    public function siswa()
    {
        return $this->belongsToMany(Siswa::class);
    }

    public function daftar_pelajaran()
    {
        return $this->belongsToMany(DaftarPelajaran::class)->withPivot(['nilai']);
    }
}
