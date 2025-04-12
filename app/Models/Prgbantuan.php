<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prgbantuan extends Model
{
    use HasFactory;

    protected $table = "tb_prgbantuan";

    protected $fillable = [
        'prgbantuan',
    ];

    //fungsi one to many ke model Siswa
    public function siswa() {
        return $this->hasMany(Prgbantuan::class, 'id_prgbantuan', 'id');
    }
}
