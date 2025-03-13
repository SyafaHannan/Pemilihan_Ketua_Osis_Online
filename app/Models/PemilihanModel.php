<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PemilihanModel extends Model
{
    use HasFactory;
    protected $table = 'pemilihan';
    protected $primaryKey = 'id_pemilihan';
    protected $fillable = [
        'id_user',
        'id_kandidat',
        'id_forum'
    ];
    public function user():BelongsTo{
        return $this->belongsTo(UserModel::class,'id_user','id_user');
    }
    public function kandidat():BelongsTo{
        return $this->belongsTo(KandidatModel::class,'id_kandidat','id_kandidat');
    }
    public function forum():BelongsTo{
        return $this->belongsTo(ForumModel::class,'id_forum','id_forum');
    }
}
