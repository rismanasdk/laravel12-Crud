<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $fillable =[
        'nama',
        'harga',
        'deskripsi',
        'gambar'
    ];
}
