<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = "tb_pendidikan";

    protected $fillable = [
        'jenjang_pendidikan',
    ];

    //fungsi one to many ke model Siswa
    public function siswa_ayah() {
        return $this->hasMany(Pendidikan::class, 'id_pendidikan_ayah', 'id');
    }

    //fungsi one to many ke model Siswa
    public function siswa_ibu() {
        return $this->hasMany(Pendidikan::class, 'id_pendidikan_ibu', 'id');
    }
    
    //fungsi one to many ke model Siswa
    public function siswa_wali() {
        return $this->hasMany(Pendidikan::class, 'id_pendidikan_wali', 'id');
    }
}
