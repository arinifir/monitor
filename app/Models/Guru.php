<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'guru';
    protected $dates = ['deleted_at'];
    protected $hidden = ['deleted_at'];
    public $primaryKey = 'id';
    public $keyType = 'string';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'nig',
        'nama',
        'mapel',
        'kelas_id',
        'username',
        'password'
    ];

    public function guru()
    {
        return $this->hasMany(Nilai::class, 'guru_id', 'id');
    }

    public function hasKelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
