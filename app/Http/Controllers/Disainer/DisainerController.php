<?php

namespace App\Http\Controllers\Disainer;

use App\Http\Controllers\Controller;
use App\Models\BarangMasukCostumerServices;
use App\Models\BarangMasukDatalayout;
use App\Models\BarangMasukDisainer;
use App\Models\BarangMasukMesin;
use App\Models\Gambar;
use App\Models\MesinAtexco;
use App\Models\MesinMimaki;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PDO;
use PDOException;

class DisainerController extends Controller
{
    public function getIndexUserDisainer()
    {
        $user = Auth::user();
        $disainer = BarangMasukDisainer::where('users_id', $user->id)
            ->with('Users', 'DataMesin', 'UsersCs')
            ->where('tanda_telah_mengerjakan', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        // return response()->json($disainer);
        return view('component.Disainer.disainer-pegawai.index', compact('disainer'));
    }

    public function getCreateToTeamMesin($nama_tim)
    {
        $disainer = BarangMasukDisainer::where('nama_tim', $nama_tim)->first();
        $mesin = User::where('roles', 'atexco')->where('non_aktif', '1')->get();
        $user = User::where('roles', 'atexco')->get();

        $userCounts = [];
        foreach ($mesin as $v) {
            $userId = $v->id;
            $barangMasukCount = BarangMasukMesin::where('nama_mesin_id', $userId)
                ->where('status', 0)
                ->count();
            $userCounts[$userId] = $barangMasukCount;
        }

        // return response()->json($userCounts);

        return view('component.Disainer.disainer-pegawai.create', compact('disainer', 'userCounts', 'mesin'));
    }

    public function postToTeamMesin(Request $request, $nama_tim)
    {
        $user = Auth::user();

        if ($request->file('file')) {
            $file = $request->file('file')->store('data-tes-mesin', 'public');
        }

        BarangMasukMesin::create([
            'barang_masuk_disainer_id' => $request->barang_masuk_disainer_id,
            'users_id' => $user->id,
            'nama_mesin_id' => $request->nama_mesin_id,
            'file' => $file,
            'keterangan' => $request->keterangan
        ]);

        $update = BarangMasukDisainer::where('nama_tim', $nama_tim)->first();
        $update->update([
            'aksi' => '1'
        ]);

        return redirect()->route('getIndexDisainerPegawai')->with('success', 'Selamat data yang anda input telah terkirim!');
    }

    public function getUpdateToTeamMesin(Request $request, $id)
    {
        $disainer = BarangMasukMesin::find($id);
        $mesin = User::whereIn('roles', ['atexco'])->where('non_aktif', '1')->get();
        $userCounts = [];
        foreach ($mesin as $v) {
            $userId = $v->id;
            $barangMasukCount = BarangMasukMesin::where('nama_mesin_id', $userId)
                ->where('status', 0)
                ->count();
            $userCounts[$userId] = $barangMasukCount;
        }

        // return response()->json($disainer);

        return view('component.Disainer.disainer-pegawai.update', compact('disainer', 'mesin', 'userCounts'));
    }

    public function putUpdateToTeamMesin(Request $request, $id)
    {
        $disainer = BarangMasukMesin::find($id);

        if ($request->file('file')) {
            $file = $request->file('file')->store('data-tes-mesin', 'public');
            if ($disainer->file && file_exists(storage_path('app/public/' . $disainer->file))) {
                Storage::delete('public/' . $disainer->file);
                $file = $request->file('file')->store('data-tes-mesin', 'public');
            }
        }

        if ($request->file('file') === null) {
            $file = $disainer->file;
        }

        $disainer->update([
            'nama_mesin_id' => $request->nama_mesin_id,
            'status' => '0',
            'file' => $file,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('getIndexDisainerPegawai')->with('success', 'Selamat data yang anda input telah terkirim!');
    }

    public function getCreateToTeamCs($nama_tim)
    {
        $disainer = BarangMasukDisainer::with('DataMesinCs.User')->where('nama_tim', $nama_tim)->first();

        $mesin = User::whereIn('roles', ['atexco'])->get();
        $userCounts = [];
        foreach ($mesin as $v) {
            $userId = $v->id;
            $barangMasukCount = BarangMasukMesin::where('nama_mesin_id', $userId)
                ->where('status', 0)
                ->count();
            $userCounts[$userId] = $barangMasukCount;
        }


        return view('component.Disainer.disainer-pegawai.create-Cs', compact('disainer', 'userCounts', 'mesin'));
    }

    public function postToCustomerServices(Request $request, $nama_tim)
    {
        $user = Auth::user();
        $bulan_sekarang = date('m');
        $tahun_sekarang = substr(date('Y'), -2);

        $last_order_number = BarangMasukCostumerServices::latest()->value('no_order');
        if ($last_order_number) {
            $parts = explode('-', $last_order_number);
            $last_bulan = substr($parts[0], 1);
            $last_tahun = substr($parts[1], 0, 2);
            $last_sequence = substr($parts[1], 2);

            if ($bulan_sekarang == $last_bulan && $tahun_sekarang == $last_tahun) {
                $next_sequence = intval($last_sequence) + 1;
            } else {
                $next_sequence = 1;
            }
        } else {
            $next_sequence = 1;
        }


        $new_order_number = '#' . $bulan_sekarang . '-' . $tahun_sekarang . str_pad($next_sequence, 3, '0', STR_PAD_LEFT);


        $filebajuplayer = null;
        $filebajupelatih = null;
        $filebajukiper = null;
        $filebaju1 = null;
        $fileCelanaplayer = null;
        $fileCelanapelatih = null;
        $fileCelanakiper = null;
        $fileCelana1 = null;

        if ($request->file('file_baju_player')) {
            $filebajuplayer = $request->file('file_baju_player')->store('file-dari-disainer-to-Cs-baju-1', 'public');
            // $uploadFile = $request->file('file_baju_player');
            // // $originalFileName = $uploadFile->getClientOriginalName();
            // $filebajuplayer = $uploadFile->storeAs('file-dari-disainer-to-Cs-baju', 'public');
        }
        if ($request->file('file_baju_pelatih')) {
            // $uploadFile = $request->file('file_baju_pelatih');
            // // $originalFileName = $uploadFile->getClientOriginalName();
            // $filebajupelatih = $uploadFile->storeAs('file-dari-disainer-to-Cs-baju', 'public');
            $filebajupelatih = $request->file('file_baju_pelatih')->store('file-dari-disainer-to-Cs-baju-2', 'public');
        }
        if ($request->file('file_baju_kiper')) {
            // $uploadFile = $request->file('file_baju_kiper');
            // $originalFileName = $uploadFile->getClientOriginalName();
            // $filebajukiper = $uploadFile->storeAs('file-dari-disainer-to-Cs-baju', 'public');
            $filebajukiper = $request->file('file_baju_kiper')->store('file-dari-disainer-to-Cs-baju-3', 'public');
        }
        if ($request->file('file_baju_1')) {
            // $uploadFile = $request->file('file_baju_1');
            // $originalFileName = $uploadFile->getClientOriginalName();
            // $filebaju1 = $uploadFile->storeAs('file-dari-disainer-to-Cs-baju', 'public');
            $filebaju1 = $request->file('file_baju_1')->store('file-dari-disainer-to-Cs-baju-4', 'public');
        }

        if ($request->file('file_celana_player')) {
            // $uploadFile = $request->file('file_celana_player');
            // $originalFileName = $uploadFile->getClientOriginalName();
            // $fileCelanaplayer = $uploadFile->storeAs('file-dari-disainer-to-Cs-celana', 'public');
            $fileCelanaplayer = $request->file('file_celana_player')->store('file-dari-disainer-to-Cs-celana-5', 'public');
        }
        if ($request->file('file_celana_pelatih')) {
            // $uploadFile = $request->file('file_celana_pelatih');
            // $originalFileName = $uploadFile->getClientOriginalName();
            // $fileCelanapelatih = $uploadFile->storeAs('file-dari-disainer-to-Cs-celana', 'public');
            $fileCelanapelatih = $request->file('file_celana_pelatih')->store('file-dari-disainer-to-Cs-celana-6', 'public');
        }
        if ($request->file('file_celana_kiper')) {
            // $uploadFile = $request->file('file_celana_kiper');
            // $originalFileName = $uploadFile->getClientOriginalName();
            // $fileCelanakiper = $uploadFile->storeAs('file-dari-disainer-to-Cs-celana', 'public');
            $fileCelanakiper = $request->file('file_celana_kiper')->store('file-dari-disainer-to-Cs-celana-7', 'public');
        }
        if ($request->file('file_celana_1')) {
            // $uploadFile = $request->file('file_celana_1');
            // $originalFileName = $uploadFile->getClientOriginalName();
            // $fileCelana1 = $uploadFile->storeAs('file-dari-disainer-to-Cs-celana', 'public');
            $fileCelana1 = $request->file('file_celana_1')->store('file-dari-disainer-to-Cs-celana-8', 'public');
        }
        if ($request->file('file_corel_disainer')) {
            $uploadFile = $request->file('file_corel_disainer');
            $originalFileName = $uploadFile->getClientOriginalName();
            $fileCorelDisainer = $uploadFile->storeAs('file-corel-disainer', $originalFileName, 'public');
        } else {
            return redirect()->back()->with('error', 'File Corel Disainer harus diisi!');
        }

        $barangMasuk = BarangMasukCostumerServices::create([
            'no_order' => $new_order_number,
            'barang_masuk_disainer_id' => $request->barang_masuk_disainer_id,
            'disainer_id' => $user->id,
            'cs_id' => $request->cs_id,
            'jenis_mesin' => $request->jenis_mesin,

            'file_corel_disainer' => $fileCorelDisainer,
            // 'tanggal_masuk' => Carbon::now(),
        ]);

        Gambar::create([
            'barang_masuk_costumer_services_id' => $barangMasuk->id,
            'file_baju_player' => $filebajuplayer,
            'file_baju_pelatih' => $filebajupelatih,
            'file_baju_kiper' => $filebajukiper,
            'file_baju_1' => $filebaju1,
            'file_celana_player' => $fileCelanaplayer,
            'file_celana_pelatih' => $fileCelanapelatih,
            'file_celana_kiper' => $fileCelanakiper,
            'file_celana_1' => $fileCelana1,
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
            ->with('UsersCs', 'DataMesinFix', 'Users')
            ->where('tanda_telah_mengerjakan', 1)
            ->orderBy('updated_at', 'desc')
            ->get();

        // return response()->json($disainer);
        return view('component.Disainer.data-fix-disainer-pegawai.index', compact('disainer'));
    }

    public function getUpdatePassword()
    {
        $users = User::findOrFail(Auth::user()->id);
        // return response()->json($users);

        return view('component.update-passsword.index', compact('users'));
    }

    public function postUpdatePassword(Request $request)
    {
        // return response()->json($request->all());
        $this->validate($request, [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = Auth::user();


        $user->password = Hash::make($request->password);
        // return response()->json($user);

        $user->save();

        return redirect()->back()->with('success', 'Permission telah diperbarui.');
    }
}
