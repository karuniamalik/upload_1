<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id';
    // cek yang bisa di edit
    protected $fillable = [
        'nama_barang',
        'spesifikasi',
        'gambar',
        'harga',
        'stok',
        'status',
        'kategori_id'
    ];
}
