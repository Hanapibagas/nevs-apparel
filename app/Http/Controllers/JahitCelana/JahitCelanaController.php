<?php

namespace App\Http\Controllers\JahitCelana;

use App\Http\Controllers\Controller;
use App\Models\DataJahitCelana;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JahitCelanaController extends Controller
{
    public function getIndex()
    {
        $dataMasuk = DataJahitCelana::with('BarangMasukCs', 'BarangMasukSortir')
            ->where('tanda_telah_mengerjakan', 0)
            ->whereHas('BarangMasukSortir', function ($query) {
                $query->whereNotNull('selesai');
            })
            ->get();

        return view('component.Jahit-Celana.index', compact('dataMasuk'));
    }

    public function getInputLaporan($id)
    {
        $dataMasuk = DataJahitCelana::with('BarangMasukCs')->find($id);
        return view('component.Jahit-Celana.cerate-laporan-mesin', compact('dataMasuk'));
    }

    public function putLaporan(Request $request, $id)
    {
        $user = Auth::user();
        $dataMasuk = DataJahitCelana::find($id);

        $dataMasuk->update([
            'penanggung_jawab_id' => $user->id,
            'selesai' => Carbon::now(),
            'pola_celana' => $request->pola_celana,
            'tanda_telah_mengerjakan' => 1
        ]);

        if ($dataMasuk) {
            $laporan = Laporan::where('barang_masuk_jahit_celana_id', $dataMasuk->id)->first();
            if ($laporan) {
                $laporan->update([
                    'status' => 'Press Tag',
                ]);
            }
        }

        return redirect()->route('getIndexFix')->with('success', 'Selamat data yang anda input telah terkirim!');
    }

    public function getIndexFix()
    {
        $dataMasuk = DataJahitCelana::with('BarangMasukCs', 'BarangMasukSortir')
            ->where('tanda_telah_mengerjakan', 1)
            ->whereHas('BarangMasukSortir', function ($query) {
                $query->whereNotNull('selesai');
            })
            ->get();

        return view('component.Jahit-Celana.index-fix', compact('dataMasuk'));
    }
}