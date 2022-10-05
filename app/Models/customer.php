<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = 'user';
	protected $primaryKey = 'id_user';
	public $incrementing = false;
	public $timestamps = false;

    protected $fillable = [
        'id_user',
        'username',
       'nama_user',
       'password',
    ];
}
