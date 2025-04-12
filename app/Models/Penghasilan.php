<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghasilan extends Model
{
    use HasFactory;

    protected $table = "tb_penghasilan";

    protected $fillable = [
        'penghasilan',
    ];

    
    //fungsi one to many ke model Siswa
    public function siswa_ayah() {
        return $this->hasMany(Penghasilan::class, 'id_penghasilan_ayah', 'id');
    }

    //fungsi one to many ke model Siswa
    public function siswa_ibu() {
        return $this->hasMany(Penghasilan::class, 'id_penghasilan_ibu', 'id');
    }
    
    //fungsi one to many ke model Siswa
    public function siswa_wali() {
        return $this->hasMany(Penghasilan::class, 'id_penghasilan_wali', 'id');
    }
}
