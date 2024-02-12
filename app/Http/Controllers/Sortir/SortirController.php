<?php

namespace App\Http\Controllers\Sortir;

use App\Http\Controllers\Controller;
use App\Models\DataSortir;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SortirController extends Controller
{
    public function getIndex()
    {
        $user = Auth::user();
        if ($user->asal_kota == 'makassar') {
            $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut')
                ->where('tanda_telah_mengerjakan', 0)
                ->whereHas('BarangMasukManualCut', function ($query) {
                    $query->whereNotNull('selesai');
                })
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Makassar');
                })
                ->get();
        } elseif ($user->asal_kota == 'jakarta') {
            $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut')
                ->where('tanda_telah_mengerjakan', 0)
                ->whereHas('BarangMasukManualCut', function ($query) {
                    $query->whereNotNull('selesai');
                })
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Jakarta');
                })
                ->get();
        } elseif ($user->asal_kota == 'bandung') {
            $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut')
                ->where('tanda_telah_mengerjakan', 0)
                ->whereHas('BarangMasukManualCut', function ($query) {
                    $query->whereNotNull('selesai');
                })
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Bandung');
                })
                ->get();
        } else {
            $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut')
                ->where('tanda_telah_mengerjakan', 0)
                ->whereHas('BarangMasukManualCut', function ($query) {
                    $query->whereNotNull('selesai');
                })
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Surabaya');
                })
                ->get();
        }

        return view('component.Sortir.index', compact('dataMasuk'));
    }

    public function getInputLaporan($id)
    {
        $dataMasuk = DataSortir::with('BarangMasukCs')->find($id);
        return view('component.Sortir.cerate-laporan-mesin', compact('dataMasuk'));
    }

    public function putLaporan(Request $request, $id)
    {
        $user = Auth::user();
        $dataMasuk = DataSortir::find($id);

        $dataMasuk->update([
            'penanggung_jawab_id' => $user->id,
            'selesai' => Carbon::now(),
            'no_error' => $request->no_error,
            'panjang_kertas' => $request->panjang_kertas,
            'tanda_telah_mengerjakan' => 1
        ]);

        if ($dataMasuk) {
            $laporan = Laporan::where('barang_masuk_sortir_id', $dataMasuk->id)->first();
            if ($laporan) {
                $laporan->update([
                    'status' => 'Jahit Baju',
                ]);
            }
        }

        return redirect()->route('getIndexFix')->with('success', 'Selamat data yang anda input telah terkirim!');
    }

    public function getIndexFix()
    {
        $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut')
            ->where('tanda_telah_mengerjakan', 1)
            ->whereHas('BarangMasukManualCut', function ($query) {
                $query->whereNotNull('selesai');
            })
            ->get();

        return view('component.Laser-Cut.index-fix', compact('dataMasuk'));
    }
}
