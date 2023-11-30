<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolaLengan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_kera',
        'gambar',
    ];
}
