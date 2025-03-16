<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    use HasFactory;

    protected $table = "tb_pangkat";

    protected $fillable = [
        'pangkat',
    ];

    //fungsi one to many ke model Pegawai
    public function pegawai() {
        return $this->hasMany(Pangkat::class, 'id_pangkat', 'id');
    }
}
