<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'barang_produk';
	protected $primaryKey = 'id_barang';
	public $incrementing = false;
	public $timestamps = false;

    protected $fillable = [
        'id_barang',
        "id_produk",
        'nama_barang',
        'gambar_barang',
        'deksripsi',
    ];
}
