<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanLkLayout extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_layout_id',
        'no_order_id',
        'panjang_kertas',
        'file_corel_layout',
    ];

    public function UserLayout()
    {
        return $this->belongsTo(User::class, 'users_layout_id');
    }

    public function BarangMasukCsLK()
    {
        return $this->belongsTo(BarangMasukCostumerServices::class, 'no_order_id');
    }
}
