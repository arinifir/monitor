<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'siswa';
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
        'nis',
        'nama',
        'kelas_id',
        'username',
        'password'
    ];

    public function siswa()
    {
        return $this->hasMany(Nilai::class, 'siswa_id', 'id');
    }

    public function hasKelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
