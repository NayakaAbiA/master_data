<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = "tb_sekolah";

    protected $fillable = [
        'npsn',
        'nama_sekolah',
        'jenjang',
    ];

    //fungsi one to many ke model Siswa
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_sekolah_asal', 'id');
    }
}
