<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasukDisainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'nama_cs',
        'nama_tim'
    ];

    public function Users()
    {
        return $this->belongsTo(User::class, 'nama_cs');
    }

    public function DataMesin()
    {
        return $this->hasMany(BarangMasukMesin::class, 'barang_masuk_disainer_id', 'id');
    }

    public function BarangMasukCostumer()
    {
        return $this->belongsTo(BarangMasukCostumerServices::class, 'barang_masuk_disainer_id');
    }
}
