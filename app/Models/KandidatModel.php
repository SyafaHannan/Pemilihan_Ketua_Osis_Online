<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KandidatModel extends Model
{
    use HasFactory;
    protected $table = 'kandidat';
    protected $primaryKey = 'id_kandidat';
    protected $fillable = ['calon_ketua','calon_wakil_ketua','visi','misi','foto'];
}
