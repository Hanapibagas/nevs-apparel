<?php

namespace App\Http\Controllers\Mesin;

use App\Http\Controllers\Controller;
use App\Models\BarangMasukCostumerServices;
use App\Models\BarangMasukMesin;
use App\Models\MesinAtexco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AtexcoController extends Controller
{
    public function getIndexAtexco()
    {
        $mesin = BarangMasukMesin::where('nama_mesin', 'atexco')
            ->with('Users', 'BarangMasukDisainer')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('component.Mesin.mesin-atexco-pegawai.index', compact('mesin'));
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

    public function getIndexDataMasukAtexco()
    {
        $dataMasuk = MesinAtexco::with('BarangMasukCs', 'BarangMasukLayout')
            ->where('tanda_telah_mengerjakan', 0)
            ->whereHas('BarangMasukLayout', function ($query) {
                $query->whereNotNull('selesai');
            })
            ->get();

        return view('component.Mesin.data-masuk-mesin-atexco.index', compact('dataMasuk'));
    }

    public function getIndexDataMasukAtexcoFix()
    {
        $dataMasuk = MesinAtexco::with('BarangMasukCs', 'BarangMasukLayout')
            ->where('tanda_telah_mengerjakan', 1)
            ->whereHas('BarangMasukLayout', function ($query) {
                $query->whereNotNull('selesai');
            })
            ->get();

        return view('component.Mesin.data-masuk-mesin-fix-atexco.index', compact('dataMasuk'));
    }
}
