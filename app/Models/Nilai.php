<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nilai extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'nilai';
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
        'siswa_id',
        'guru_id',
        'nilai',
        'jenis',
        'keterangan'
    ];

    public function hasSiswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function hasGuru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
}
