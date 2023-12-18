<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasukCostumerServices extends Model
{
    use HasFactory;

    protected $fillable = [
        // order
        'no_order',
        'barang_masuk_disainer_id',
        'cs_id',
        'disainer_id',
        'jenis_mesin',
        'tanggal_jahit',
        'nama_penjahit',
        'no_nota',

        // produksi
        'layout_id',
        'jenis_produksi',
        'pola',
        'tanggal_masuk',
        'deadline',

        // baju
        'jumlah_baju',
        'jenis_sablon_baju',
        'jenis_kerah_baju_id',
        'jenis_pola_lengan_id',
        'jenis_kain_baju',
        'ket_kumis_baju',
        'ket_bantalan_baju',
        'ket_celana',
        'ket_tambahan_baju',
        'file_baju_player',
        'file_baju_pelatih',
        'file_baju_kiper',

        // celana
        'jumlah_celana',
        'jenis_sablon_celana',
        'jenis_pola_celana_id',
        'jenis_kain_celana',
        'ket_warna_kain_celana',
        'ket_bis_celana_celana',
        'ket_tambahan_celana',
        'file_celana_player',
        'file_celana_pelatih',
        'file_celana_kiper',

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
