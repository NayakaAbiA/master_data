<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'tb_kecamatan';

    protected $fillable = [
        'id_kabupaten',
        'kecamatan',
    ];

    //fungsi agar model Kecamatan berelasi dengan model Kabupaten
    public function kabupaten() {
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten', 'id'); //dengan relasi banyak ke 1
    }

    //fungsi agar model  Kecamatan berelasi dengan model Kelurahan
    public function kelurahan() {
        return $this->hasMany(Kelurahan::class, 'id_kecamatan', 'id'); //dengan relasi 1 ke banyak
    }

     //fungsi one to many ke model Pegawai
     public function pegawai() {
        return $this->hasMany(Kecamatan::class, 'id_kecamatan', 'id');
    }
}
