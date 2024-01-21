<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesinAtexco extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_masuk_disainer_id',
        'barang_masuk_layout_id',
        'nama_mesin',
        'deadline'
    ];

    public function BarangMasukCs()
    {
        return $this->belongsTo(BarangMasukCostumerServices::class, 'barang_masuk');
    }

    // public function BarangMasukAtexco()
    // {
    //     return $this->hasMany(LaporanLkLayout::class, 'no_order_id');
    // }
}
