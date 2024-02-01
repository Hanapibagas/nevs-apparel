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
        'penanggung_jawab_id',
        'nama_mesin',
        'deadline',
        'selesai',
    ];

    public function BarangMasukCs()
    {
        return $this->belongsTo(BarangMasukCostumerServices::class, 'barang_masuk');
    }

    public function UserMesinAtexco()
    {
        return $this->belongsTo(User::class, 'penanggung_jawab_id');
    }
}
