<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
     use HasFactory;

    protected $table = 'tb_rombel';

    protected $guarded = [];

    //fungsi one to one ke model Pegawai
    public function walas()
    {
        return $this->hasOne(Pegawai::class, 'id', 'id_ptk_walas');
    }
}
