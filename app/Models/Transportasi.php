<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    use HasFactory;

    protected $table = "tb_transport";

    protected $fillable = [
        'alat_transport',
    ];

    //fungsi one to many ke model Siswa
    public function siswa()
    {
        return $this->hasMany(Transportasi::class, 'id_transport', 'id');
    }
}
