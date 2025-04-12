<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'tb_jurusan';

    protected $guarded = [];

    //fungsi one to one ke model Pegawai
    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id', 'id_ptk_kakom');
    }

    //fungsi one to many ke model Siswa
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_jur', 'id');
    }

}
