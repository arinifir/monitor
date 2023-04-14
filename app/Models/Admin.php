<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'admin';
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
        'nama',
        'username',
        'password'
    ];

}
