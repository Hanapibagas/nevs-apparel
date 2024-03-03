<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPressKain extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_order_id',
        'penanggung_jawab_id',
        'mesin_atexco_id',
        'mesin_mimaki_id',
        'deadline',
        'selesai',
        'kain',
        'berat',
        'gambar',
        'tanda_telah_mengerjakan',
    ];

    public function BarangMasukCs()
    {
        return $this->belongsTo(BarangMasukCostumerServices::class, 'no_order_id');
    }

    public function MesinMimaki()
    {
        return $this->belongsTo(MesinMimaki::class, 'mesin_mimaki_id');
    }

    public function MesinAtexco()
    {
        return $this->belongsTo(MesinAtexco::class, 'mesin_atexco_id');
    }
}
