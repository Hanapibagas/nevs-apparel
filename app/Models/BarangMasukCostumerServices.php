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
        'kota_produksi',
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

        // baju player
        'file_baju_player',
        'jenis_sablon_baju_player',
        'kera_baju_player_id',
        'pola_lengan_player_id',
        'jenis_kain_baju_player',
        'ket_kumis_baju_player',
        'ket_bantalan_baju_player',
        'ket_celana_player',
        'ket_tambahan_baju_player',
        'keterangan_baju_pelayer',

        // baju pelatih
        'file_baju_pelatih',
        'jenis_sablon_baju_pelatih',
        'kerah_baju_pelatih_id',
        'pola_lengan_pelatih_id',
        'jenis_kain_baju_pelatih',
        'ket_kumis_baju_pelatih',
        'ket_bantalan_baju_pelatih',
        'ket_celana_pelatih',
        'ket_tambahan_baju_pelatih',
        'keterangan_baju_pelatih',

        // baju kiper
        'file_baju_kiper',
        'jenis_sablon_baju_kiper',
        'kerah_baju_kiper_id',
        'pola_lengan_kiper_id',
        'jenis_kain_baju_kiper',
        'ket_kumis_baju_kiper',
        'ket_bantalan_baju_kiper',
        'ket_celana_kiper',
        'ket_tambahan_baju_kiper',
        'keterangan_baju_kiper',

        // baju 1
        'file_baju_1',
        'jenis_sablon_baju_1',
        'kerah_baju_1_id',
        'pola_lengan_1_id',
        'jenis_kain_baju_1',
        'ket_kumis_baju_1',
        'ket_bantalan_baju_1',
        'ket_celana_1',
        'ket_tambahan_baju_1',
        'keterangan_baju_1',

        // celana player
        'file_celana_player',
        'jenis_sablon_celana_player',
        'pola_celana_player_id',
        'jenis_kain_celana_player',
        'ket_warna_kain_celana_player',
        'ket_bis_celana_celana_player',
        'ket_tambahan_celana_player',
        'keterangan_celana_pelayer',

        // celana pelatih
        'file_celana_pelatih',
        'jenis_sablon_celana_pelatih',
        'pola_celana_pelatih_id',
        'jenis_kain_celana_pelatih',
        'ket_warna_kain_celana_pelatih',
        'ket_bis_celana_celana_pelatih',
        'ket_tambahan_celana_pelatih',
        'keterangan_celana_pelatih',

        // celana kiper
        'file_celana_kiper',
        'jenis_sablon_celana_kiper',
        'pola_celana_kiper_id',
        'jenis_kain_celana_kiper',
        'ket_warna_kain_celana_kiper',
        'ket_bis_celana_celana_kiper',
        'ket_tambahan_celana_kiper',
        'keterangan_celana_kiper',

        // celana 1
        'file_celana_1',
        'jenis_sablon_celana_1',
        'pola_celana_1_id',
        'jenis_kain_celana_1',
        'ket_warna_kain_celana_1',
        'ket_bis_celana_celana_1',
        'ket_tambahan_celana_1',
        'keterangan_celana_1',

        'file_corel_disainer',
        'keterangan_lengkap',
        'aksi',
        'tanda_telah_mengerjakan',
        // 'tanda_inputan_laporan',
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

    public function LaporanLkLayout()
    {
        return $this->hasMany(LaporanLkLayout::class, 'no_order_id');
    }

    public function MesinAtexco()
    {
        return $this->hasMany(MesinAtexco::class, 'barang_masuk');
    }

    // player
    public function KeraPlayer()
    {
        return $this->belongsTo(KeraBaju::class, 'kera_baju_player_id');
    }
    public function LenganPlayer()
    {
        return $this->belongsTo(PolaLengan::class, 'pola_lengan_player_id');
    }
    public function CelanaPlayer()
    {
        return $this->belongsTo(PolaCeleana::class, 'pola_celana_player_id');
    }

    // pelatih
    public function KeraPelatih()
    {
        return $this->belongsTo(KeraBaju::class, 'kerah_baju_pelatih_id');
    }
    public function LenganPelatih()
    {
        return $this->belongsTo(PolaLengan::class, 'pola_lengan_pelatih_id');
    }
    public function CelanaPelatih()
    {
        return $this->belongsTo(PolaCeleana::class, 'pola_celana_pelatih_id');
    }

    // kiper
    public function KeraKiper()
    {
        return $this->belongsTo(KeraBaju::class, 'kerah_baju_kiper_id');
    }
    public function LenganKiper()
    {
        return $this->belongsTo(PolaLengan::class, 'pola_lengan_kiper_id');
    }
    public function CelanaKiper()
    {
        return $this->belongsTo(PolaCeleana::class, 'pola_celana_kiper_id');
    }

    // 1
    public function Kera1()
    {
        return $this->belongsTo(KeraBaju::class, 'kerah_baju_1_id');
    }
    public function Lengan1()
    {
        return $this->belongsTo(PolaLengan::class, 'pola_lengan_1_id');
    }
    public function Celana1()
    {
        return $this->belongsTo(PolaCeleana::class, 'pola_celana_1_id');
    }
}
