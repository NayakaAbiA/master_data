<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $table = "tb_agama";

    protected $fillable = [
        'nama_agama',
    ];

    //fungsi one to many ke model Pegawai
    public function pegawai() {
        return $this->hasMany(Pegawai::class, 'id_agama', 'id');
    }

    //fungsi one to many ke model Siswa
    public function siswa() {
        return $this->hasMany(Siswa::class, 'id_agama', 'id');
    }
}
