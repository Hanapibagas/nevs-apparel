<?php

namespace App\Http\Controllers\Disainer;

use App\Http\Controllers\Controller;
use App\Models\BarangMasukDisainer;
use App\Models\BarangMasukMesin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisainerController extends Controller
{
    public function getIndexUserDisainer()
    {
        $user = Auth::user();
        $disainer = BarangMasukDisainer::where('users_id', $user->id)
            ->with('Users', 'DataMesin')
            ->get();

        // return response()->json($disainer);

        return view('component.disainer-pegawai.index', compact('disainer'));
    }

    public function getCreateToTeamMesin($nama_tim)
    {
        $disainer = BarangMasukDisainer::where('nama_tim', $nama_tim)->first();

        return view('component.disainer-pegawai.create', compact('disainer'));
    }

    public function postToTeamMesin(Request $request)
    {
        $user = Auth::user();

        if ($request->file('file')) {
            $uploadFile = $request->file('file');
            $originalFileName = $uploadFile->getClientOriginalName();
            $file = $uploadFile->storeAs('file-dari-disainer', $originalFileName, 'public');
        }

        BarangMasukMesin::create([
            'barang_masuk_disainer_id' => $request->barang_masuk_disainer_id,
            'users_id' => $user->id,
            'nama_mesin' => $request->nama_mesin,
            'file' => $file,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('getIndexDisainerPegawai')->with('success', 'Selamat data yang anda input telah terkirim!');
    }
}
