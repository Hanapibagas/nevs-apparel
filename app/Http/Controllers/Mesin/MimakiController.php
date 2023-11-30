<?php

namespace App\Http\Controllers\Mesin;

use App\Http\Controllers\Controller;
use App\Models\BarangMasukMesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MimakiController extends Controller
{
    public function getIndexMimaki()
    {
        $mesin = BarangMasukMesin::where('nama_mesin', 'mimaki')->with('Users', 'BarangMasukDisainer')->get();

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
}
