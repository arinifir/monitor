<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'kelas';
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
        'nama'
    ];

    public function kelasGuru()
    {
        return $this->hasMany(Guru::class, 'kelas_id', 'id');
    }

    public function kelasSiswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id', 'id');
    }
}
