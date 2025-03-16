<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberGaji extends Model
{
    use HasFactory;

    protected $table = "tb_sumber_gaji";

    protected $fillable = [
        'sumber_gaji',
    ];

    //fungsi one to many ke model Pegawai
    public function pegawai() {
        return $this->hasMany(SumberGaji::class, 'id_sumber_gaji', 'id');
    }
}
