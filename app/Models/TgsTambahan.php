<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TgsTambahan extends Model
{
    use HasFactory;

    protected $table = "tb_tgstambahan";

    protected $fillable = [
        'tgs_tambahan',
    ];

    //fungsi one to many ke model Pegawai
    public function pegawai() {
        return $this->hasMany(TgsTambahan::class, 'id_tgstambahan', 'id');
    }
}
