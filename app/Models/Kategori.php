<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    // cek yang bisa di edit
    protected $fillable = [
        'kategori',
        'status',
        'jenis_kategori'

    ];
}
