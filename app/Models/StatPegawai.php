<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatPegawai extends Model
{
    use HasFactory;

    protected $table = "tb_stat_pegawai";

    protected $fillable = [
        'stat_peg',
    ];

    //fungsi agar model StatPegawai berelasi dengan model Pegawai
    public function pegawai() {
        return $this->hasMany(Pegawai::class, 'id_stat_peg', 'id'); //dengan relasi 1 ke banyak
    }
}
