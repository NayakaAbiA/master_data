<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KrtBantuan extends Model
{
    use HasFactory;

    protected $table = "tb_krtbantuan";

    protected $fillable = [
        'no_krtbantuan',
        'nama_krtbantuan',
        'nama_pdkrt',
    ];

    //fungsi one to many ke model Siswa
    public function siswa() {
        return $this->hasMany(KrtBantuan::class, 'id_krt_bantuan', 'id');
    }
    public function siswa_nokip() {
        return $this->hasMany(KrtBantuan::class, 'id_krt_bantuan_kip', 'id');
    }
    public function siswa_nokps() {
        return $this->hasMany(KrtBantuan::class, 'id_krt_bantuan_kps', 'id');
    }
    public function siswa_nokks() {
        return $this->hasMany(KrtBantuan::class, 'id_krt_bantuan_kks', 'id');
    }
}
