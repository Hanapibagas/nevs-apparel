<?php

namespace App\Http\Controllers\Disainer;

use App\Http\Controllers\Controller;
use App\Models\BarangMasukCostumerServices;
use App\Models\BarangMasukDisainer;
use App\Models\BarangMasukMesin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisainerController extends Controller
{
    public function getIndexUserDisainer()
    {
        $user = Auth::user();
        $disainer = BarangMasukDisainer::where('users_id', $user->id)
            ->with('Users', 'DataMesin')
            ->where('tanda_telah_mengerjakan', 0)
            ->get();

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

    public function getCreateToTeamCs($nama_tim)
    {
        $disainer = BarangMasukDisainer::where('nama_tim', $nama_tim)->first();

        return view('component.disainer-pegawai.create-Cs', compact('disainer'));
    }

    public function postToCustomerServices(Request $request, $nama_tim)
    {
        $user = Auth::user();

        if ($request->file('file_corel')) {
            $uploadFile = $request->file('file_corel');
            $originalFileName = $uploadFile->getClientOriginalName();
            $file = $uploadFile->storeAs('file-dari-disainer-to-Cs', $originalFileName, 'public');
        }

        $no_order = '#10-12' . str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);

        BarangMasukCostumerServices::create([
            'no_order' => $no_order,
            'barang_masuk_disainer_id' => $request->barang_masuk_disainer_id,
            'disainer_id' => $user->id,
            'cs_id' => $request->cs_id,
            'jenis_mesin' => $request->jenis_mesin,
            'file_corel' => $file,
            'tanggal_masuk' => Carbon::now(),
        ]);

        $update = BarangMasukDisainer::where('nama_tim', $nama_tim)->first();
        $update->update([
            'tanda_telah_mengerjakan' => '1'
        ]);

        return redirect()->route('getIndexDisainerPegawai')->with('success', 'Selamat data yang anda input telah terkirim!');
    }

    public function getDataFixDisainer()
    {
        $user = Auth::user();
        $disainer = BarangMasukDisainer::where('users_id', $user->id)
            ->with('Users', 'DataMesinFix')
            ->where('tanda_telah_mengerjakan', 1)
            ->get();

        // return response()->json($disainer);

        return view('component.data-fix-disainer-pegawai.index', compact('disainer'));
    }
}
