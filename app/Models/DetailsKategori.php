<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsKategori extends Model
{
    use HasFactory;
    protected $table = 'details_kategori';
    protected $guarded = ['id'];
}
