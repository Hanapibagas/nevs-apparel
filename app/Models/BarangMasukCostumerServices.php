<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasukCostumerServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_order',
        'no_nota',
        'barang_masuk_disainer_id',
        'disainer_id',
        'cs_id',
        'layout_id',
        'jenis_mesin',
        'file_corel',
        'status_produksi',
        'tanggal_masuk',
        'deadline',
        'jenis_produksi',
        'jenis_kerah',
        'pola',
        'jumlah_baju',
        'jenis_sablon_baju',
        'jenis_kain_baju',
        'jumlah_celana',
        'jenis_sablon_celana',
        'jenis_kain_celana',
        'list_data',
        'aksi',
        'tanda_telah_mengerjakan',
    ];

    public function BarangMasukDisainer()
    {
        return $this->belongsTo(BarangMasukDisainer::class, 'barang_masuk_disainer_id');
    }

    public function Users()
    {
        return $this->belongsTo(User::class, 'disainer_id');
    }

    public function UsersOrder()
    {
        return $this->belongsTo(User::class, 'cs_id');
    }

    public function UsersLk()
    {
        return $this->belongsTo(User::class, 'layout_id');
    }
}
