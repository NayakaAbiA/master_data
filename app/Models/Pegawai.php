<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'tb_ptk';

    protected $guarded = [];

    //fungsi one to one ke model Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id', 'id_ptk_kakom');
    }

    //fungsi one to one ke model Rombel
    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'id', 'id_ptk_walas');
    }
}
