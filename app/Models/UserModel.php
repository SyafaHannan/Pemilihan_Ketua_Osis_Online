<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Authenticatable
{
    use HasFactory;
    protected $table = 'user';
    protected $fillable = [
        'nama',
        'kelas',
        'no_induk',
        'tanggal_lahir',
        'status'
    ];
}
