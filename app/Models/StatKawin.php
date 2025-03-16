<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatKawin extends Model
{
    use HasFactory;

    protected $table = "tb_statkawin";

    protected $fillable = [
        'status_kawin',
    ];

    //fungsi one to many ke model Pegawai
    public function pegawai() {
        return $this->hasMany(StatKawin::class, 'id_statkawin', 'id');
    }
}
