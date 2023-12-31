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
use PDF;

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
            ->with(
                'BarangMasukDisainer',
                'Users',
                'UsersOrder',
                'UsersLk',
                'KeraPlayer',
                'LenganPlayer',
                'CelanaPlayer',
                'KeraPelatih',
                'LenganPelatih',
                'CelanaPelatih',
                'KeraKiper',
                'LenganKiper',
                'CelanaKiper',
                'Kera1',
                'Lengan1',
                'Celana1'
            )
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

        // return response()->json($oderCs);
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
        $oderCs = BarangMasukCostumerServices::with(
            'BarangMasukDisainer',
            'Users',
            'UsersOrder',
            'UsersLk',
            'KeraPlayer',
            'LenganPlayer',
            'CelanaPlayer',
            'KeraPelatih',
            'LenganPelatih',
            'CelanaPelatih',
            'KeraKiper',
            'LenganKiper',
            'CelanaKiper',
            'Kera1',
            'Lengan1',
            'Celana1'
        )->find($id);

        // return response()->json($oderCs);
        $kera = KeraBaju::all();
        $lengan = PolaLengan::all();
        $celana = PolaCeleana::all();

        return view('component.Cs.costumer-service-lk-pegawai.update', compact('oderCs', 'users', 'userCounts', 'kera', 'lengan', 'celana'));
    }

    public function putDataLk(Request $request, $id)
    {
        $lk = BarangMasukCostumerServices::find($id);

        $totalUkuranBaju = $request->ukuran_s_player_baju + $request->ukuran_m_player_baju + $request->ukuran_l_player_baju +
            $request->ukuran_xl_player_baju + $request->ukuran_xs_player_baju + $request->ukuran_2xl_player_baju +
            $request->ukuran_3xl_player_baju + $request->ukuran_4xl_player_baju + $request->ukuran_5xl_player_baju +
            $request->ukuran_s_pelatih_baju + $request->ukuran_m_pelatih_baju + $request->ukuran_l_pelatih_baju +
            $request->ukuran_xl_pelatih_baju + $request->ukuran_xs_pelatih_baju + $request->ukuran_2xl_pelatih_baju +
            $request->ukuran_3xl_pelatih_baju + $request->ukuran_4xl_pelatih_baju + $request->ukuran_5xl_pelatih_baju +
            $request->ukuran_s_kiper_baju + $request->ukuran_m_kiper_baju + $request->ukuran_l_kiper_baju +
            $request->ukuran_xl_kiper_baju + $request->ukuran_xs_kiper_baju + $request->ukuran_2xl_kiper_baju +
            $request->ukuran_3xl_kiper_baju + $request->ukuran_4xl_kiper_baju + $request->ukuran_5xl_kiper_baju +
            $request->ukuran_s_1_baju + $request->ukuran_m_1_baju + $request->ukuran_l_1_baju +
            $request->ukuran_xl_1_baju + $request->ukuran_xs_1_baju + $request->ukuran_2xl_1_baju +
            $request->ukuran_3xl_1_baju + $request->ukuran_4xl_1_baju + $request->ukuran_5xl_1_baju;

        $totalUkuranCelana = $request->ukuran_s_player_celana + $request->ukuran_m_player_celana + $request->ukuran_l_player_celana +
            $request->ukuran_xl_player_celana + $request->ukuran_xs_player_celana + $request->ukuran_2xl_player_celana +
            $request->ukuran_3xl_player_celana + $request->ukuran_4xl_player_celana + $request->ukuran_5xl_player_celana +
            $request->ukuran_s_pelatih_celana + $request->ukuran_m_pelatih_celana + $request->ukuran_l_pelatih_celana +
            $request->ukuran_xl_pelatih_celana + $request->ukuran_xs_pelatih_celana + $request->ukuran_2xl_pelatih_celana +
            $request->ukuran_3xl_pelatih_celana + $request->ukuran_4xl_pelatih_celana + $request->ukuran_5xl_pelatih_celana +
            $request->ukuran_s_kiper_celana + $request->ukuran_m_kiper_celana + $request->ukuran_l_kiper_celana +
            $request->ukuran_xl_kiper_celana + $request->ukuran_xs_kiper_celana + $request->ukuran_2xl_kiper_celana +
            $request->ukuran_3xl_kiper_celana + $request->ukuran_4xl_kiper_celana + $request->ukuran_5xl_kiper_celana +
            $request->ukuran_s_1_celana + $request->ukuran_m_1_celana + $request->ukuran_l_1_celana +
            $request->ukuran_xl_1_celana + $request->ukuran_xs_1_celana + $request->ukuran_2xl_1_celana +
            $request->ukuran_3xl_1_celana + $request->ukuran_4xl_1_celana + $request->ukuran_5xl_1_celana;

        $lk->update([
            'tanggal_jahit' => $request->tanggal_jahit,
            'nama_penjahit' => $request->nama_penjahit,
            'no_nota' => $request->no_nota,
            'kota_produksi' => $request->kota_produksi,

            'layout_id' => $request->layout_id,
            'jenis_produksi' => $request->jenis_produksi,
            'pola' => $request->pola,
            'deadline' => $request->deadline,

            'jenis_sablon_baju' => $request->jenis_sablon_baju,
            'jenis_kerah_baju_id' => $request->jenis_kerah_baju_id,
            'jenis_pola_lengan_id' => $request->jenis_pola_lengan_id,
            'jenis_kain_baju' => $request->jenis_kain_baju,
            'ket_kumis_baju' => $request->ket_kumis_baju,
            'ket_bantalan_baju' => $request->ket_bantalan_baju,
            'ket_celana' => $request->ket_celana,
            'ket_tambahan_baju' => $request->ket_tambahan_baju,
            // baju player
            'ukuran_s_player_baju' => $request->ukuran_s_player_baju,
            'ukuran_m_player_baju' => $request->ukuran_m_player_baju,
            'ukuran_l_player_baju' => $request->ukuran_l_player_baju,
            'ukuran_xl_player_baju' => $request->ukuran_xl_player_baju,
            'ukuran_xs_player_baju' => $request->ukuran_xs_player_baju,
            'ukuran_2xl_player_baju' => $request->ukuran_2xl_player_baju,
            'ukuran_3xl_player_baju' => $request->ukuran_3xl_player_baju,
            'ukuran_4xl_player_baju' => $request->ukuran_4xl_player_baju,
            'ukuran_5xl_player_baju' => $request->ukuran_5xl_player_baju,
            // baju pelatih
            'ukuran_s_pelatih_baju' => $request->ukuran_s_pelatih_baju,
            'ukuran_m_pelatih_baju' => $request->ukuran_m_pelatih_baju,
            'ukuran_l_pelatih_baju' => $request->ukuran_l_pelatih_baju,
            'ukuran_xl_pelatih_baju' => $request->ukuran_xl_pelatih_baju,
            'ukuran_xs_pelatih_baju' => $request->ukuran_xs_pelatih_baju,
            'ukuran_2xl_pelatih_baju' => $request->ukuran_2xl_pelatih_baju,
            'ukuran_3xl_pelatih_baju' => $request->ukuran_3xl_pelatih_baju,
            'ukuran_4xl_pelatih_baju' => $request->ukuran_4xl_pelatih_baju,
            'ukuran_5xl_pelatih_baju' => $request->ukuran_5xl_pelatih_baju,
            // baju kiper
            'ukuran_s_kiper_baju' => $request->ukuran_s_kiper_baju,
            'ukuran_m_kiper_baju' => $request->ukuran_m_kiper_baju,
            'ukuran_l_kiper_baju' => $request->ukuran_l_kiper_baju,
            'ukuran_xl_kiper_baju' => $request->ukuran_xl_kiper_baju,
            'ukuran_xs_kiper_baju' => $request->ukuran_xs_kiper_baju,
            'ukuran_2xl_kiper_baju' => $request->ukuran_2xl_kiper_baju,
            'ukuran_3xl_kiper_baju' => $request->ukuran_3xl_kiper_baju,
            'ukuran_4xl_kiper_baju' => $request->ukuran_4xl_kiper_baju,
            'ukuran_5xl_kiper_baju' => $request->ukuran_5xl_kiper_baju,
            // baju 1
            'ukuran_s_1_baju' => $request->ukuran_s_1_baju,
            'ukuran_m_1_baju' => $request->ukuran_m_1_baju,
            'ukuran_l_1_baju' => $request->ukuran_l_1_baju,
            'ukuran_xl_1_baju' => $request->ukuran_xl_1_baju,
            'ukuran_xs_1_baju' => $request->ukuran_xs_1_baju,
            'ukuran_2xl_1_baju' => $request->ukuran_2xl_1_baju,
            'ukuran_3xl_1_baju' => $request->ukuran_3xl_1_baju,
            'ukuran_4xl_1_baju' => $request->ukuran_4xl_1_baju,
            'ukuran_5xl_1_baju' => $request->ukuran_5xl_1_baju,
            'total_baju' => $totalUkuranBaju,

            'jenis_sablon_celana' => $request->jenis_sablon_celana,
            'jenis_pola_celana_id' => $request->jenis_pola_celana_id,
            'jenis_kain_celana' => $request->jenis_kain_celana,
            'ket_warna_kain_celana' => $request->ket_warna_kain_celana,
            'ket_bis_celana_celana' => $request->ket_bis_celana_celana,
            'ket_tambahan_celana' => $request->ket_tambahan_celana,
            // celana player
            'ukuran_s_player_celana' => $request->ukuran_s_player_celana,
            'ukuran_m_player_celana' => $request->ukuran_m_player_celana,
            'ukuran_l_player_celana' => $request->ukuran_l_player_celana,
            'ukuran_xl_player_celana' => $request->ukuran_xl_player_celana,
            'ukuran_xs_player_celana' => $request->ukuran_xs_player_celana,
            'ukuran_2xl_player_celana' => $request->ukuran_2xl_player_celana,
            'ukuran_3xl_player_celana' => $request->ukuran_3xl_player_celana,
            'ukuran_4xl_player_celana' => $request->ukuran_4xl_player_celana,
            'ukuran_5xl_player_celana' => $request->ukuran_5xl_player_celana,
            // celana pelatih
            'ukuran_s_pelatih_celana' => $request->ukuran_s_pelatih_celana,
            'ukuran_m_pelatih_celana' => $request->ukuran_m_pelatih_celana,
            'ukuran_l_pelatih_celana' => $request->ukuran_l_pelatih_celana,
            'ukuran_xl_pelatih_celana' => $request->ukuran_xl_pelatih_celana,
            'ukuran_xs_pelatih_celana' => $request->ukuran_xs_pelatih_celana,
            'ukuran_2xl_pelatih_celana' => $request->ukuran_2xl_pelatih_celana,
            'ukuran_3xl_pelatih_celana' => $request->ukuran_3xl_pelatih_celana,
            'ukuran_4xl_pelatih_celana' => $request->ukuran_4xl_pelatih_celana,
            'ukuran_5xl_pelatih_celana' => $request->ukuran_5xl_pelatih_celana,
            // celana kiper
            'ukuran_s_kiper_celana' => $request->ukuran_s_kiper_celana,
            'ukuran_m_kiper_celana' => $request->ukuran_m_kiper_celana,
            'ukuran_l_kiper_celana' => $request->ukuran_l_kiper_celana,
            'ukuran_xl_kiper_celana' => $request->ukuran_xl_kiper_celana,
            'ukuran_xs_kiper_celana' => $request->ukuran_xs_kiper_celana,
            'ukuran_2xl_kiper_celana' => $request->ukuran_2xl_kiper_celana,
            'ukuran_3xl_kiper_celana' => $request->ukuran_3xl_kiper_celana,
            'ukuran_4xl_kiper_celana' => $request->ukuran_4xl_kiper_celana,
            'ukuran_5xl_kiper_celana' => $request->ukuran_5xl_kiper_celana,
            // celana1
            'ukuran_xs_1_celana' => $request->ukuran_xs_1_celana,
            'ukuran_s_1_celana' => $request->ukuran_s_1_celana,
            'ukuran_m_1_celana' => $request->ukuran_m_1_celana,
            'ukuran_l_1_celana' => $request->ukuran_l_1_celana,
            'ukuran_xl_1_celana' => $request->ukuran_xl_1_celana,
            'ukuran_2xl_1_celana' => $request->ukuran_2xl_1_celana,
            'ukuran_3xl_1_celana' => $request->ukuran_3xl_1_celana,
            'ukuran_4xl_1_celana' => $request->ukuran_4xl_1_celana,
            'ukuran_5xl_1_celana' => $request->ukuran_5xl_1_celana,

            'keterangan_lengkap' => $request->keterangan_lengkap,
            'total_celana' => $totalUkuranCelana,

            'aksi' => '1',
            'tanda_telah_mengerjakan' => '1',
        ]);

        return response()->json($lk);
        return redirect()->route('getIndexOrderCsPegawai')->with('success', 'Selamat data yang input berhasil!');
    }

    public function putDataLkFix(Request $request, $id)
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

            // baju player
            'jenis_sablon_baju_player' => $request->jenis_sablon_baju_player,
            'kera_baju_player_id' => $request->kera_baju_player_id,
            'pola_lengan_player_id' => $request->pola_lengan_player_id,
            'jenis_kain_baju_player' => $request->jenis_kain_baju_player,
            'ket_kumis_baju_player' => $request->ket_kumis_baju_player,
            'ket_bantalan_baju_player' => $request->ket_bantalan_baju_player,
            'ket_celana_player' => $request->ket_celana_player,
            'ket_tambahan_baju_player' => $request->ket_tambahan_baju_player,
            'keterangan_baju_pelayer' => $request->keterangan_baju_pelayer,

            // baju pelatih
            'jenis_sablon_baju_pelatih' => $request->jenis_sablon_baju_pelatih,
            'kerah_baju_pelatih_id' => $request->kerah_baju_pelatih_id,
            'pola_lengan_pelatih_id' => $request->pola_lengan_pelatih_id,
            'jenis_kain_baju_pelatih' => $request->jenis_kain_baju_pelatih,
            'ket_kumis_baju_pelatih' => $request->ket_kumis_baju_pelatih,
            'ket_bantalan_baju_pelatih' => $request->ket_bantalan_baju_pelatih,
            'ket_celana_pelatih' => $request->ket_celana_pelatih,
            'ket_tambahan_baju_pelatih' => $request->ket_tambahan_baju_pelatih,
            'keterangan_baju_pelatih' => $request->keterangan_baju_pelatih,

            // baju kiper
            'jenis_sablon_baju_kiper' => $request->jenis_sablon_baju_kiper,
            'kerah_baju_kiper_id' => $request->kerah_baju_kiper_id,
            'pola_lengan_kiper_id' => $request->pola_lengan_kiper_id,
            'jenis_kain_baju_kiper' => $request->jenis_kain_baju_kiper,
            'ket_kumis_baju_kiper' => $request->ket_kumis_baju_kiper,
            'ket_bantalan_baju_kiper' => $request->ket_bantalan_baju_kiper,
            'ket_celana_kiper' => $request->ket_celana_kiper,
            'ket_tambahan_baju_kiper' => $request->ket_tambahan_baju_kiper,
            'keterangan_baju_kiper' => $request->keterangan_baju_kiper,

            // baju player 1
            'jenis_sablon_baju_1' => $request->jenis_sablon_baju_1,
            'kerah_baju_1_id' => $request->kerah_baju_1_id,
            'pola_lengan_1_id' => $request->pola_lengan_1_id,
            'jenis_kain_baju_1' => $request->jenis_kain_baju_1,
            'ket_kumis_baju_1' => $request->ket_kumis_baju_1,
            'ket_bantalan_baju_1' => $request->ket_bantalan_baju_1,
            'ket_celana_1' => $request->ket_celana_1,
            'ket_tambahan_baju_1' => $request->ket_tambahan_baju_1,
            'keterangan_baju_1' => $request->keterangan_baju_1,

            // celana player
            'jenis_sablon_celana_player' => $request->jenis_sablon_celana_player,
            'pola_celana_player_id' => $request->pola_celana_player_id,
            'kain_celana_player' => $request->kain_celana_player,
            'ket_warna_kain_celana_player' => $request->ket_warna_kain_celana_player,
            'ket_bis_celana_celana_player' => $request->ket_bis_celana_celana_player,
            'ket_tambahan_celana_player' => $request->ket_tambahan_celana_player,
            'keterangan_celana_pelayer' => $request->keterangan_celana_pelayer,

            // celana pelatih
            'jenis_sablon_celana_pelatih' => $request->jenis_sablon_celana_pelatih,
            'pola_celana_pelatih_id' => $request->pola_celana_pelatih_id,
            'jenis_kain_celana_pelatih' => $request->jenis_kain_celana_pelatih,
            'ket_warna_kain_celana_pelatih' => $request->ket_warna_kain_celana_pelatih,
            'ket_bis_celana_celana_pelatih' => $request->ket_bis_celana_celana_pelatih,
            'ket_tambahan_celana_pelatih' => $request->ket_tambahan_celana_pelatih,
            'keterangan_celana_pelatih' => $request->keterangan_celana_pelatih,

            // celana kiper
            'jenis_sablon_celana_kiper' => $request->jenis_sablon_celana_kiper,
            'pola_celana_kiper_id' => $request->pola_celana_kiper_id,
            'jenis_kain_celana_kiper' => $request->jenis_kain_celana_kiper,
            'ket_warna_kain_celana_kiper' => $request->ket_warna_kain_celana_kiper,
            'ket_bis_celana_celana_kiper' => $request->ket_bis_celana_celana_kiper,
            'ket_tambahan_celana_kiper' => $request->ket_tambahan_celana_kiper,
            'keterangan_celana_kiper' => $request->keterangan_celana_kiper,

            // celana 1
            'jenis_sablon_celana_1' => $request->jenis_sablon_celana_1,
            'pola_celana_1_id' => $request->pola_celana_1_id,
            'jenis_kain_celana_1' => $request->jenis_kain_celana_1,
            'ket_warna_kain_celana_1' => $request->ket_warna_kain_celana_1,
            'ket_bis_celana_celana_1' => $request->ket_bis_celana_celana_1,
            'ket_tambahan_celana_1' => $request->ket_tambahan_celana_1,
            'keterangan_celana_1' => $request->keterangan_celana_1,

            'keterangan_lengkap' => $request->keterangan_lengkap,

            'aksi' => '1',
            'tanda_telah_mengerjakan' => '1',
        ]);

        // return response()->json($lk);
        return redirect()->route('getIndexLkCsPegawai')->with('success', 'Selamat data yang input berhasil!');
    }

    public function cetakDataLk($id)
    {
        $dataLk = BarangMasukCostumerServices::with('BarangMasukDisainer', 'Users', 'UsersOrder', 'UsersLk', 'Kera', 'Lengan', 'Celana')->findOrFail($id);

        // return response()->json($dataLk);
        view()->share('dataLk', $dataLk);

        $pdf = PDF::loadview('component.Cs.costumer-service-lk-pegawai.export-data-baju', compact('dataLk'));
        $pdf->setPaper('F4', 'portrait');

        return $pdf->stream('Data-LK.pdf');
    }
}
