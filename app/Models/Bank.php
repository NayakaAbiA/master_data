<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $table = "tb_bank";

    protected $fillable = [
        'nama_bank',
    ];

    //fungsi one to many ke model Pegawai
    public function pegawai() {
        return $this->hasMany(Bank::class, 'id_bank', 'id');
    }

    //fungsi one to many ke model Siswa
    public function siswa() {
        return $this->hasMany(Bank::class, 'id_bank', 'id');
    }
}
