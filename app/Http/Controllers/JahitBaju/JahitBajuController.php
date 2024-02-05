<?php

namespace App\Http\Controllers\JahitBaju;

use App\Http\Controllers\Controller;
use App\Models\DataJahitBaju;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JahitBajuController extends Controller
{
    public function getIndex()
    {
        $dataMasuk = DataJahitBaju::with('BarangMasukCs', 'BarangMasukSortir')
            ->where('tanda_telah_mengerjakan', 0)
            ->whereHas('BarangMasukSortir', function ($query) {
                $query->whereNotNull('selesai');
            })
            ->get();

        return view('component.Jahit-Baju.index', compact('dataMasuk'));
    }

    public function getInputLaporan($id)
    {
        $dataMasuk = DataJahitBaju::with('BarangMasukCs')->find($id);
        return view('component.Jahit-Baju.cerate-laporan-mesin', compact('dataMasuk'));
    }

    public function putLaporan(Request $request, $id)
    {
        $user = Auth::user();
        $dataMasuk = DataJahitBaju::find($id);

        $dataMasuk->update([
            'penanggung_jawab_id' => $user->id,
            'selesai' => Carbon::now(),
            'leher' => $request->leher,
            'pola_badan' => $request->pola_badan,
            'tanda_telah_mengerjakan' => 1
        ]);

        if ($dataMasuk) {
            $laporan = Laporan::where('barang_masuk_jahit_baju_id', $dataMasuk->id)->first();
            if ($laporan) {
                $laporan->update([
                    'status' => 'Jahit Celana',
                ]);
            }
        }

        return redirect()->route('getIndexFix')->with('success', 'Selamat data yang anda input telah terkirim!');
    }

    public function getIndexFix()
    {
        $dataMasuk = DataJahitBaju::with('BarangMasukCs', 'BarangMasukSortir')
            ->where('tanda_telah_mengerjakan', 1)
            ->whereHas('BarangMasukSortir', function ($query) {
                $query->whereNotNull('selesai');
            })
            ->get();

        return view('component.Jahit-Baju.index-fix', compact('dataMasuk'));
    }
}
