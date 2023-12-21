<?php

namespace App\Http\Controllers\Cs;

use App\Http\Controllers\Controller;
use App\Models\BarangMasukCostumerServices;
use App\Models\BarangMasukDisainer;
use App\Models\KeraBaju;
use App\Models\PolaCeleana;
use App\Models\PolaLengan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostumerServicesController extends Controller
{
    public function getIndexOrderCs()
    {
        $user = Auth::user();
        $oderCs = BarangMasukCostumerServices::where('cs_id', $user->id)
            ->with('BarangMasukDisainer', 'Users')
            ->where('tanda_telah_mengerjakan', 0)
            ->get();

        return view('component.Cs.costumer-service-order-pegawai.index', compact('oderCs'));
    }

    public function getIndexLkCs()
    {
        $user = Auth::user();
        $oderCs = BarangMasukCostumerServices::where('cs_id', $user->id)
            ->with('BarangMasukDisainer', 'Users', 'UsersOrder', 'UsersLk', 'Kera', 'Lengan', 'Celana')
            ->where('tanda_telah_mengerjakan', 1)
            ->get();

        // return response()->json($oderCs);
        return view('component.Cs.costumer-service-lk-pegawai.index', compact('oderCs'));
    }

    public function getIndexCs()
    {
        $auth = Auth::user();
        $users = User::where('roles', 'disainer')->get();
        $disainer = BarangMasukDisainer::where('nama_cs', $auth->id)->with('Users', 'DataMesin')->get();

        $userCounts = [];
        foreach ($users as $user) {
            $userId = $user->id;
            $barangMasukCount = BarangMasukDisainer::where('users_id', $userId)
                ->where('tanda_telah_mengerjakan', 0)
                ->count();
            $userCounts[$userId] = $barangMasukCount;
        }

        return view('component.Cs.costumer-service-pegawai.index', compact('users', 'userCounts', 'disainer'));
    }

    public function postToTimDisainer(Request $request)
    {
        $user = Auth::user();
        BarangMasukDisainer::create([
            'nama_cs' => $user->id,
            'nama_tim' => $request->input('nama_tim'),
            'users_id' => $request->input('users_id')
        ]);

        return redirect()->back()->with('success', 'Data anda telah terkirim ke tim disainer');
    }

    public function createLK($id)
    {
        $users = User::where('roles', 'layout')->get();
        $userCounts = [];
        foreach ($users as $user) {
            $userId = $user->id;
            $barangMasukCount = BarangMasukCostumerServices::where('layout_id', $userId)
                ->where('tanda_telah_mengerjakan', 0)
                ->count();
            $userCounts[$userId] = $barangMasukCount;
        }
        $oderCs = BarangMasukCostumerServices::with('BarangMasukDisainer', 'Users', 'UsersOrder')->find($id);

        $kera = KeraBaju::all();
        $lengan = PolaLengan::all();
        $celana = PolaCeleana::all();

        return view('component.Cs.costumer-service-order-pegawai.create', compact('oderCs', 'users', 'userCounts', 'kera', 'lengan', 'celana'));
    }

    public function puUpdateLK($id)
    {
        $users = User::where('roles', 'layout')->get();
        $userCounts = [];
        foreach ($users as $user) {
            $userId = $user->id;
            $barangMasukCount = BarangMasukCostumerServices::where('layout_id', $userId)
                ->where('tanda_telah_mengerjakan', 0)
                ->count();
            $userCounts[$userId] = $barangMasukCount;
        }
        $oderCs = BarangMasukCostumerServices::with('BarangMasukDisainer', 'Users', 'UsersOrder', 'UsersLk', 'Kera', 'Lengan', 'Celana')->find($id);

        // return response()->json($oderCs);
        $kera = KeraBaju::all();
        $lengan = PolaLengan::all();
        $celana = PolaCeleana::all();

        return view('component.Cs.costumer-service-lk-pegawai.update', compact('oderCs', 'users', 'userCounts', 'kera', 'lengan', 'celana'));
    }

    public function putDataLk(Request $request, $id)
    {
        $lk = BarangMasukCostumerServices::find($id);

        $lk->update([
            'tanggal_jahit' => $request->tanggal_jahit,
            'nama_penjahit' => $request->nama_penjahit,
            'no_nota' => $request->no_nota,
            'kota_produksi' => $request->kota_produksi,

            'layout_id' => $request->layout_id,
            'jenis_produksi' => $request->jenis_produksi,
            'pola' => $request->pola,
            'deadline' => $request->deadline,

            'jumlah_baju' => $request->jumlah_baju,
            'jenis_sablon_baju' => $request->jenis_sablon_baju,
            'jenis_kerah_baju_id' => $request->jenis_kerah_baju_id,
            'jenis_pola_lengan_id' => $request->jenis_pola_lengan_id,
            'jenis_kain_baju' => $request->jenis_kain_baju,
            'ket_kumis_baju' => $request->ket_kumis_baju,
            'ket_bantalan_baju' => $request->ket_bantalan_baju,
            'ket_celana' => $request->ket_celana,
            'ket_tambahan_baju' => $request->ket_tambahan_baju,

            'jumlah_celana' => $request->jumlah_celana,
            'jenis_sablon_celana' => $request->jenis_sablon_celana,
            'jenis_pola_celana_id' => $request->jenis_pola_celana_id,
            'jenis_kain_celana' => $request->jenis_kain_celana,
            'ket_warna_kain_celana' => $request->ket_warna_kain_celana,
            'ket_bis_celana_celana' => $request->ket_bis_celana_celana,
            'ket_tambahan_celana' => $request->ket_tambahan_celana,

            'aksi' => '1',
            'tanda_telah_mengerjakan' => '1',
        ]);

        // return response()->json($lk);
        return redirect()->route('getIndexOrderCsPegawai')->with('success', 'Selamat data yang input berhasil!');
    }
}
