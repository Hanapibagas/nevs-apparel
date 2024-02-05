<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPacking extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_order_id',
        'prass_id',
        'selesai',
        'deadline'
    ];

    public function BarangmasukJahitBaju()
    {
        return $this->belongsTo(BarangMasukCostumerServices::class, 'no_order_id');
    }
}
