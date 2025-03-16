<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'tb_kabupaten';

    protected $fillable = [
        'id_provinsi',
        'kabupaten',
        'ibu_kota',
        'k_bsni',
    ];

    //fungsi agar model Kabupaten berelasi dengan model Provinsi
    public function provinsi() {
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id'); //dengan relasi banyak ke 1
    }

    //fungsi agar model Kecamatan berelasi dengan model Kabupaten
    public function kecamatan() {
        return $this->hasMany(Kecamatan::class, 'id_kabupaten', 'id'); //dengan relasi 1 ke banyak
    }

    //fungsi one to many ke model Pegawai
    public function pegawai() {
        return $this->hasMany(Kabupaten::class, 'id_kabupaten', 'id');
    }
}
