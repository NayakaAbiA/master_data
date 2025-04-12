<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'tb_kelurahan';

    protected $fillable = [
        'id_kecamatan',
        'kelurahan',
        'kode_pos',
    ];

    //fungsi agar model Kecamatan berelasi dengan model Kelurahan
    public function kecamatan() {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id'); //dengan relasi banyak ke 1
    }

    //fungsi one to many ke model Pegawai
    public function pegawai() {
        return $this->hasMany(Kelurahan::class, 'id_kelurahan', 'id');
    }

    //fungsi one to many ke model Siswa
    public function siswa() {
        return $this->hasMany(Kelurahan::class, 'id_kelurahan', 'id');
    }
}
