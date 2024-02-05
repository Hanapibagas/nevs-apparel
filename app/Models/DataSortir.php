<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSortir extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_order_id',
        'penanggung_jawab_id',
        'manual_cut_id',
        'no_error',
        'panjang_kertas',
        'selesai',
        'deadline'
    ];

    public function BarangmasukJahitBaju()
    {
        return $this->belongsTo(BarangMasukCostumerServices::class, 'no_order_id');
    }

    public function UserSortir()
    {
        return $this->belongsTo(User::class, 'penanggung_jawab_id');
    }
}
