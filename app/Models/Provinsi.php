<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = "tb_provinsi";

    protected $fillable = [
        'provinsi',
        'ibu_kota',
        'p_bsni',
    ];

    //fungsi agar model Provinsi berelasi dengan model Kabupaten
    public function kabupaten() {
        return $this->hasMany(Kabupaten::class, 'id_provinsi', 'id'); //dengan relasi 1 ke banyak
    }
}
