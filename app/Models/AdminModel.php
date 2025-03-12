<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Authenticatable
{
    use HasFactory;
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
        'email',
        'password',
        'username'
    ];
}
