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
}
