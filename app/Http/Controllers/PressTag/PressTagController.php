<?php

namespace App\Http\Controllers\PressTag;

use App\Http\Controllers\Controller;
use App\Models\DataPressTagSize;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PressTagController extends Controller
{
    public function getIndex()
    {
        $dataMasuk = DataPressTagSize::with('BarangMasukCs', 'BarangMasukJahitCelana')
            ->where('tanda_telah_mengerjakan', 0)
            ->whereHas('BarangMasukJahitCelana', function ($query) {
                $query->whereNotNull('selesai');
            })
            ->get();

        return view('component.Press-Tag.index', compact('dataMasuk'));
    }

    public function getInputLaporan($id)
    {
        $dataMasuk = DataPressTagSize::with('BarangMasukCs')->find($id);
        return view('component.Press-Tag.cerate-laporan-mesin', compact('dataMasuk'));
    }

    public function putLaporan(Request $request, $id)
    {
        $user = Auth::user();
        $dataMasuk = DataPressTagSize::find($id);

        $dataMasuk->update([
            'penanggung_jawab_id' => $user->id,
            'selesai' => Carbon::now(),
            'tanda_telah_mengerjakan' => 1
        ]);

        if ($dataMasuk) {
            $laporan = Laporan::where('barang_masuk_pressTagSize_id', $dataMasuk->id)->first();
            if ($laporan) {
                $laporan->update([
                    'status' => 'Packing    ',
                ]);
            }
        }

        return redirect()->route('getIndexFix')->with('success', 'Selamat data yang anda input telah terkirim!');
    }

    public function getIndexFix()
    {
        $dataMasuk = DataPressTagSize::with('BarangMasukCs', 'BarangMasukJahitCelana')
            ->where('tanda_telah_mengerjakan', 1)
            ->whereHas('BarangMasukJahitCelana', function ($query) {
                $query->whereNotNull('selesai');
            })
            ->get();

        return view('component.Press-Tag.index-fix', compact('dataMasuk'));
    }
}
