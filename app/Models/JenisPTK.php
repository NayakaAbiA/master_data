<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPTK extends Model
{
    use HasFactory;

    protected $table = "tb_jnsptk";

    protected $fillable = [
        'jenis_ptk',
    ];
}
