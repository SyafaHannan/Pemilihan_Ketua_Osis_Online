<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumModel extends Model
{
    use HasFactory;
    protected $table = 'forum';
    protected $primaryKey = 'id_forum';
    protected $fillable = [
        'judul',
        'akses',
        'tanggal_mulai',
        'tanggal_akhir',
    ];
}
