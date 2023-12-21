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

        return view('component.Disainer.disainer-pegawai.index', compact('disainer'));
    }

    public function getCreateToTeamMesin($nama_tim)
    {
        $disainer = BarangMasukDisainer::where('nama_tim', $nama_tim)->first();

        return view('component.Disainer.disainer-pegawai.create', compact('disainer'));
    }

    public function postToTeamMesin(Request $request, $nama_tim)
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

        $update = BarangMasukDisainer::where('nama_tim', $nama_tim)->first();
        $update->update([
            'aksi' => '1'
        ]);

        return redirect()->route('getIndexDisainerPegawai')->with('success', 'Selamat data yang anda input telah terkirim!');
    }

    public function getCreateToTeamCs($nama_tim)
    {
        $disainer = BarangMasukDisainer::where('nama_tim', $nama_tim)->first();

        return view('component.Disainer.disainer-pegawai.create-Cs', compact('disainer'));
    }

    public function postToCustomerServices(Request $request, $nama_tim)
    {
        $user = Auth::user();

        $no_order = '#10-12' . str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);

        $filebajuplayer = null;
        $filebajupelatih = null;
        $filebajukiper = null;
        $filebaju1 = null;
        $fileCelanaplayer = null;
        $fileCelanapelatih = null;
        $fileCelanakiper = null;
        $fileCelana1 = null;

        if ($request->file('file_baju_player')) {
            $uploadFile = $request->file('file_baju_player');
            $originalFileName = $uploadFile->getClientOriginalName();
            $filebajuplayer = $uploadFile->storeAs('file-dari-disainer-to-Cs-baju', $originalFileName, 'public');
        }
        if ($request->file('file_baju_pelatih')) {
            $uploadFile = $request->file('file_baju_pelatih');
            $originalFileName = $uploadFile->getClientOriginalName();
            $filebajupelatih = $uploadFile->storeAs('file-dari-disainer-to-Cs-baju', $originalFileName, 'public');
        }
        if ($request->file('file_baju_kiper')) {
            $uploadFile = $request->file('file_baju_kiper');
            $originalFileName = $uploadFile->getClientOriginalName();
            $filebajukiper = $uploadFile->storeAs('file-dari-disainer-to-Cs-baju', $originalFileName, 'public');
        }
        if ($request->file('file_baju_1')) {
            $uploadFile = $request->file('file_baju_1');
            $originalFileName = $uploadFile->getClientOriginalName();
            $filebaju1 = $uploadFile->storeAs('file-dari-disainer-to-Cs-baju', $originalFileName, 'public');
        }

        if ($request->file('file_celana_player')) {
            $uploadFile = $request->file('file_celana_player');
            $originalFileName = $uploadFile->getClientOriginalName();
            $fileCelanaplayer = $uploadFile->storeAs('file-dari-disainer-to-Cs-celana', $originalFileName, 'public');
        }
        if ($request->file('file_celana_pelatih')) {
            $uploadFile = $request->file('file_celana_pelatih');
            $originalFileName = $uploadFile->getClientOriginalName();
            $fileCelanapelatih = $uploadFile->storeAs('file-dari-disainer-to-Cs-celana', $originalFileName, 'public');
        }
        if ($request->file('file_celana_kiper')) {
            $uploadFile = $request->file('file_celana_kiper');
            $originalFileName = $uploadFile->getClientOriginalName();
            $fileCelanakiper = $uploadFile->storeAs('file-dari-disainer-to-Cs-celana', $originalFileName, 'public');
        }
        if ($request->file('file_celana_1')) {
            $uploadFile = $request->file('file_celana_1');
            $originalFileName = $uploadFile->getClientOriginalName();
            $fileCelana1 = $uploadFile->storeAs('file-dari-disainer-to-Cs-celana', $originalFileName, 'public');
        }

        BarangMasukCostumerServices::create([
            'no_order' => $no_order,
            'barang_masuk_disainer_id' => $request->barang_masuk_disainer_id,
            'disainer_id' => $user->id,
            'cs_id' => $request->cs_id,
            'jenis_mesin' => $request->jenis_mesin,
            'file_baju_player' => $filebajuplayer,
            'file_baju_pelatih' => $filebajupelatih,
            'file_baju_kiper' => $filebajukiper,
            'file_baju_1' => $filebaju1,
            'file_celana_player' => $fileCelanaplayer,
            'file_celana_pelatih' => $fileCelanapelatih,
            'file_celana_kiper' => $fileCelanakiper,
            'file_celana_1' => $fileCelana1,
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

        return view('component.Disainer.data-fix-disainer-pegawai.index', compact('disainer'));
    }
}
