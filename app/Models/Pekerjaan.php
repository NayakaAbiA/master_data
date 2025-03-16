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
}
