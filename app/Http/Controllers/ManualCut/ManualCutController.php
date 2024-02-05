<?php

namespace App\Http\Controllers\ManualCut;

use App\Http\Controllers\Controller;
use App\Models\DataManualCut;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManualCutController extends Controller
{
    public function getIndex()
    {
        $dataMasuk = DataManualCut::with('BarangMasukCs', 'BarangMasukLaserCut')
            ->where('tanda_telah_mengerjakan', 0)
            ->whereHas('BarangMasukLaserCut', function ($query) {
                $query->whereNotNull('selesai');
            })
            ->get();

        return view('component.Laser-Cut.index', compact('dataMasuk'));
    }

    public function getInputLaporan($id)
    {
        $dataMasuk = DataManualCut::with('BarangMasukLaserCut')->find($id);
        return view('component.Manual-Cut.cerate-laporan-mesin', compact('dataMasuk'));
    }

    public function putLaporan(Request $request, $id)
    {
        $user = Auth::user();
        $dataMasuk = DataManualCut::find($id);

        $dataMasuk->update([
            'penanggung_jawab_id' => $user->id,
            'selesai' => Carbon::now(),
            'tanda_telah_mengerjakan' => 1
        ]);

        if ($dataMasuk) {
            $laporan = Laporan::where('barang_masuk_manualcut_id', $dataMasuk->id)->first();
            if ($laporan) {
                $laporan->update([
                    'status' => 'Sortir',
                ]);
            }
        }

        return redirect()->route('getIndexFix')->with('success', 'Selamat data yang anda input telah terkirim!');
    }

    public function getIndexFix()
    {
        $dataMasuk = DataManualCut::with('BarangMasukCs', 'BarangMasukLaserCut')
            ->where('tanda_telah_mengerjakan', 1)
            ->whereHas('BarangMasukLaserCut', function ($query) {
                $query->whereNotNull('selesai');
            })
            ->get();

        return view('component.Laser-Cut.index-fix', compact('dataMasuk'));
    }
}
