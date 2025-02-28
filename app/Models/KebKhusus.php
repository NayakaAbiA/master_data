<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebKhusus extends Model
{
    use HasFactory;

    protected $table = "tb_kebkhusus";

    protected $fillable = [
        'kebkhusus',
    ];
}
