<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPressTagSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_order_id',
        'jahit_baju_id',
        'jahit_celana_id',
        'deadline',
        'selesai',
    ];

    public function BarangmasukJahitBaju()
    {
        return $this->belongsTo(BarangMasukCostumerServices::class, 'no_order_id');
    }
}
