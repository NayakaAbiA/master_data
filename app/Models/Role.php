<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'role',
    ];

    public function scopeSearch($query, $search)
    {
        $query->where('role', 'like', '%' . $search . '%');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'role_id');
    }
}
