<?php

namespace App\Http\Controllers\Packing;

use App\Http\Controllers\Controller;
use App\Models\DataPacking;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackingController extends Controller
{
    public function getIndex()
    {
        $dataMasuk = DataPacking::with('BarangMasukCs', 'BarangMasukPress')
            ->where('tanda_telah_mengerjakan', 0)
            ->whereHas('BarangMasukPress', function ($query) {
                $query->whereNotNull('selesai');
            })
            ->get();

        return view('component.Packing.index', compact('dataMasuk'));
    }

    public function getInputLaporan($id)
    {
        $dataMasuk = DataPacking::with('BarangMasukCs')->find($id);
        return view('component.Packing.cerate-laporan-mesin', compact('dataMasuk'));
    }

    public function putLaporan(Request $request, $id)
    {
        $user = Auth::user();
        $dataMasuk = DataPacking::find($id);

        $dataMasuk->update([
            'penanggung_jawab_id' => $user->id,
            'selesai' => Carbon::now(),
            'tanda_telah_mengerjakan' => 1
        ]);

        if ($dataMasuk) {
            $laporan = Laporan::where('barang_masuk_packing_id', $dataMasuk->id)->first();
            if ($laporan) {
                $laporan->update([
                    'status' => 'Selesai',
                ]);
            }
        }

        return redirect()->route('getIndexFix')->with('success', 'Selamat data yang anda input telah terkirim!');
    }

    public function getIndexFix()
    {
        $dataMasuk = DataPacking::with('BarangMasukCs', 'BarangMasukPress')
            ->where('tanda_telah_mengerjakan', 1)
            ->whereHas('BarangMasukPress', function ($query) {
                $query->whereNotNull('selesai');
            })
            ->get();

        return view('component.Packing.index-fix', compact('dataMasuk'));
    }
}
