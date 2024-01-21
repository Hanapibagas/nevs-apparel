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
        $mesin = BarangMasukMesin::where('nama_mesin', 'atexco')->with('Users', 'BarangMasukDisainer')->get();

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

    // $dataMasuk = MesinAtexco::with(['BarangMasukCs', 'BarangMasukAtexco'])->get();
    public function getIndexDataMasukAtexco()
    {
        $dataMasuk = BarangMasukCostumerServices::where('jenis_mesin', 'atexco')->with('LaporanLkLayout', 'MesinAtexco')->get();

        return response()->json($dataMasuk);
    }
}
