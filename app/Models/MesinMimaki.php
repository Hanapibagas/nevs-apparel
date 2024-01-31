<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesinMimaki extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_order_id',
        'barang_masuk_layout_id',
        'nama_mesin',
        'deadline',
    ];
}
