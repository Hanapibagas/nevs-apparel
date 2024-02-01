<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJahitCelana extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_order_id',
        'penanggung_jawab_id',
        'selesai',
        'pola_celana',
        'deadline'
    ];

    public function BarangmasukJahitBaju()
    {
        return $this->belongsTo(BarangMasukCostumerServices::class, 'no_order_id');
    }

    public function UserJahitCelana()
    {
        return $this->belongsTo(User::class, 'penanggung_jawab_id');
    }
}
