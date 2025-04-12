<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTinggal extends Model
{
    use HasFactory;

    protected $table = "tb_jnstinggal";

    protected $fillable = [
        'jnstinggal',
    ];

    //fungsi one to many ke model Siswa
    public function siswa() {
        return $this->hasMany(JenisTinggal::class, 'id_jns_tgl', 'id');
    }
}
