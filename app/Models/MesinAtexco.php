<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesinAtexco extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_order_id',
        'barang_masuk_layout_id',
        'penanggung_jawab_id',
        'nama_mesin',
        'deadline',
        'selesai',
        'tanda_telah_mengerjakan',
    ];

    public function BarangMasukCs()
    {
        return $this->belongsTo(BarangMasukCostumerServices::class, 'no_order_id');
    }

    public function UserMesinAtexco()
    {
        return $this->belongsTo(User::class, 'penanggung_jawab_id');
    }

    public function BarangMasukLayout()
    {
        return $this->hasMany(BarangMasukDatalayout::class, 'no_order_id');
    }
}
