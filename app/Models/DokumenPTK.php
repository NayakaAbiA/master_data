<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPTK extends Model
{
    use HasFactory;

    protected $table = 'tb_dokumen_ptk';
    protected $guarded = [];

    public function ptk()
    {
        return $this->belongsTo(Pegawai::class, 'id_ptk', 'id');
    }
}
