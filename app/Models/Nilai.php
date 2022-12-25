<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function mapel(){
        return $this->belongsTo(DaftarPelajaran::class);
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }
}
