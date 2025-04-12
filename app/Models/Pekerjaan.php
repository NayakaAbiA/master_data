<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = "tb_pekerjaan";

    protected $fillable = [
        'pekerjaan',
    ];

    //fungsi one to many ke model Pegawai
     public function pegawai() {
        return $this->hasMany(Pekerjaan::class, 'id_pekerjaan_pasangan', 'id');
    }

    //fungsi one to many ke model Siswa
    public function siswa_ayah() {
        return $this->hasMany(Pekerjaan::class, 'id_kerja_ayah', 'id');
    }

    //fungsi one to many ke model Siswa
    public function siswa_ibu() {
        return $this->hasMany(Pekerjaan::class, 'id_kerja_ibu', 'id');
    }
    
    //fungsi one to many ke model Siswa
    public function siswa_wali() {
        return $this->hasMany(Pekerjaan::class, 'id_kerja_wali', 'id');
    }
}
