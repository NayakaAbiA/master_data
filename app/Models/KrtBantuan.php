<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KrtBantuan extends Model
{
    use HasFactory;

    protected $table = "tb_krtbantuan";

    protected $fillable = [
        'no_krtbantuan',
        'nama_krtbantuan',
        'nama_pdkrt',
    ];
}
