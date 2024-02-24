<?php

namespace App\Http\Controllers\Mesin;

use App\Http\Controllers\Controller;
use App\Models\BarangMasukMesin;
use App\Models\Laporan;
use App\Models\MesinMimaki;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MimakiController extends Controller
{
    public function getIndexMimaki()
    {
        $mesin = BarangMasukMesin::where('nama_mesin', 'mimaki')
            ->with('Users', 'BarangMasukDisainer')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('component.Mesin.mesin-mimaki-pegawai.index', compact('mesin'));
    }

    public function putFeedBackToDisainer(Request $request, $id)
    {
        $user = Auth::user();

        $mesin = BarangMasukMesin::find($id);

        $mesin->update([
            'nama_penanggung_jawab_mesin_ACC' => $user->id,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Selamat data yang input berhasil!');
    }

    public function getIndexDataMasukMimaki()
    {
        $user = Auth::user();
        if ($user->asal_kota == 'makassar') {
            $dataMasuk = MesinMimaki::with('BarangMasukCs', 'BarangMasukLayout', 'BarangMasukCs.BarangMasukDisainer')
                ->where('tanda_telah_mengerjakan', 0)
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Makassar');
                })
                ->whereHas('BarangMasukLayout', function ($query) {
                    $query->whereNotNull('selesai');
                })
                ->get();
        } elseif ($user->asal_kota == 'jakarta') {
            $dataMasuk = MesinMimaki::with('BarangMasukCs', 'BarangMasukLayout', 'BarangMasukCs.BarangMasukDisainer')
                ->where('tanda_telah_mengerjakan', 0)
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Jakarta');
                })
                ->whereHas('BarangMasukLayout', function ($query) {
                    $query->whereNotNull('selesai');
                })
                ->get();
        } elseif ($user->asal_kota == 'bandung') {
            $dataMasuk = MesinMimaki::with('BarangMasukCs', 'BarangMasukLayout', 'BarangMasukCs.BarangMasukDisainer')
                ->where('tanda_telah_mengerjakan', 0)
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Bandung');
                })
                ->whereHas('BarangMasukLayout', function ($query) {
                    $query->whereNotNull('selesai');
                })
                ->get();
        } else {
            $dataMasuk = MesinMimaki::with('BarangMasukCs', 'BarangMasukLayout', 'BarangMasukCs.BarangMasukDisainer')
                ->where('tanda_telah_mengerjakan', 0)
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Surabaya');
                })
                ->whereHas('BarangMasukLayout', function ($query) {
                    $query->whereNotNull('selesai');
                })
                ->get();
        }

        return view('component.Mesin.data-masuk-mesin-mimaki.index', compact('dataMasuk'));
    }

    public function getInputLaporan($id)
    {
        $dataMasuk = MesinMimaki::with('BarangMasukCs')->find($id);
        return view('component.Mesin.data-masuk-mesin-mimaki.cerate-laporan-mesin', compact('dataMasuk'));
    }

    public function putLaporanMesin(Request $request, $id)
    {
        $user = Auth::user();
        $dataMasuk = MesinMimaki::with('BarangMasukCs')->find($id);

        $dataMasuk->update([
            'penanggung_jawab_id' => $user->id,
            'selesai' => Carbon::now(),
            'tanda_telah_mengerjakan' => 1
        ]);

        if ($dataMasuk) {
            $laporan = Laporan::where('barang_masuk_mesin_mimaki_id', $dataMasuk->id)->first();
            if ($laporan) {
                $laporan->update([
                    'status' => 'Press Kain',
                ]);
            }
        }

        return redirect()->route('getIndexDataMasukMimakiFix')->with('success', 'Selamat data yang anda input telah terkirim!');
    }

    public function getIndexDataMasukMimakiFix()
    {
        $user = Auth::user();
        if ($user->asal_kota == 'makassar') {
            $dataMasuk = MesinMimaki::with('BarangMasukCs', 'BarangMasukLayout', 'BarangMasukCs.BarangMasukDisainer')
                ->where('tanda_telah_mengerjakan', 1)
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Makassar');
                })
                ->whereHas('BarangMasukLayout', function ($query) {
                    $query->whereNotNull('selesai');
                })
                ->get();
        } elseif ($user->asal_kota == 'jakarta') {
            $dataMasuk = MesinMimaki::with('BarangMasukCs', 'BarangMasukLayout', 'BarangMasukCs.BarangMasukDisainer')
                ->where('tanda_telah_mengerjakan', 1)
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Jakarta');
                })
                ->whereHas('BarangMasukLayout', function ($query) {
                    $query->whereNotNull('selesai');
                })
                ->get();
        } elseif ($user->asal_kota == 'bandung') {
            $dataMasuk = MesinMimaki::with('BarangMasukCs', 'BarangMasukLayout', 'BarangMasukCs.BarangMasukDisainer')
                ->where('tanda_telah_mengerjakan', 1)
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Bandung');
                })
                ->whereHas('BarangMasukLayout', function ($query) {
                    $query->whereNotNull('selesai');
                })
                ->get();
        } else {
            $dataMasuk = MesinMimaki::with('BarangMasukCs', 'BarangMasukLayout', 'BarangMasukCs.BarangMasukDisainer')
                ->where('tanda_telah_mengerjakan', 1)
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Surabaya');
                })
                ->whereHas('BarangMasukLayout', function ($query) {
                    $query->whereNotNull('selesai');
                })
                ->get();
        }

        return view('component.Mesin.data-masuk-mesin-fix-mimaki.index', compact('dataMasuk'));
    }
}
