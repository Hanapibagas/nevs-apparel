<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use App\Models\BarangMasukCostumerServices;
use App\Models\BarangMasukDatalayout;
use App\Models\LaporanLkLayout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class LayoutController extends Controller
{
    public function getIndexLkCs()
    {
        $user = Auth::user();
        if ($user->asal_kota == 'makassar') {
            $oderCs = BarangMasukDatalayout::with('UserLayout', 'BarangMasukCsLK')
                ->where('users_layout_id', $user->id)
                ->where('tanda_telah_mengerjakan', 0)
                ->whereHas('BarangMasukCsLK', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Makassar');
                })
                ->orderBy('created_at', 'desc')
                ->get();
        } elseif ($user->asal_kota == 'jakarta') {
            $oderCs = BarangMasukDatalayout::with('UserLayout', 'BarangMasukCsLK')
                ->where('users_layout_id', $user->id)
                ->where('tanda_telah_mengerjakan', 0)
                ->whereHas('BarangMasukCsLK', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Jakarta');
                })
                ->orderBy('created_at', 'desc')
                ->get();
        } elseif ($user->asal_kota == 'bandung') {
            $oderCs = BarangMasukDatalayout::with('UserLayout', 'BarangMasukCsLK')
                ->where('users_layout_id', $user->id)
                ->where('tanda_telah_mengerjakan', 0)
                ->whereHas('BarangMasukCsLK', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Bandung');
                })
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $oderCs = BarangMasukDatalayout::with('UserLayout', 'BarangMasukCsLK')
                ->where('users_layout_id', $user->id)
                ->where('tanda_telah_mengerjakan', 0)
                ->whereHas('BarangMasukCsLK', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Surabaya');
                })
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('component.Layout.layout-lk-pegawai.index', compact('oderCs'));
    }

    public function getIndexLaporanLk()
    {
        $user = Auth::user();
        if ($user->asal_kota == 'makassar') {
            $oderCs = BarangMasukDatalayout::with('UserLayout', 'BarangMasukCsLK')
                ->where('users_layout_id', $user->id)
                ->where('tanda_telah_mengerjakan', 1)
                ->whereHas('BarangMasukCsLK', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Makassar');
                })
                ->orderBy('created_at', 'desc')
                ->get();
        } elseif ($user->asal_kota == 'jakarta') {
            $oderCs = BarangMasukDatalayout::with('UserLayout', 'BarangMasukCsLK')
                ->where('users_layout_id', $user->id)
                ->where('tanda_telah_mengerjakan', 1)
                ->whereHas('BarangMasukCsLK', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Jakarta');
                })
                ->orderBy('created_at', 'desc')
                ->get();
        } elseif ($user->asal_kota == 'bandung') {
            $oderCs = BarangMasukDatalayout::with('UserLayout', 'BarangMasukCsLK')
                ->where('users_layout_id', $user->id)
                ->where('tanda_telah_mengerjakan', 1)
                ->whereHas('BarangMasukCsLK', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Bandung');
                })
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $oderCs = BarangMasukDatalayout::with('UserLayout', 'BarangMasukCsLK')
                ->where('users_layout_id', $user->id)
                ->where('tanda_telah_mengerjakan', 1)
                ->whereHas('BarangMasukCsLK', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Surabaya');
                })
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('component.Layout.laporan-layout.index', compact('oderCs'));
    }

    public function cetakDataLk($id)
    {
        $dataLk = BarangMasukCostumerServices::with(
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
        )->findOrFail($id);

        // return response()->json($dataLk);
        view()->share('dataLk', $dataLk->BarangMasukDisainer->nama_tim);

        $pdf = PDF::loadview('component.Cs.costumer-service-lk-pegawai.export-data-baju', compact('dataLk'));
        $pdf->setPaper('F4', 'portrait');

        return $pdf->stream('Data-LK.pdf');
    }

    public function createLaporanLk($id)
    {
        $dataLk = BarangMasukDatalayout::with('BarangMasukCsLK')->find($id);

        return view('component.Layout.layout-lk-pegawai.cerate-laporan-lk', compact('dataLk'));
    }

    public function putLaporanLs(Request $request, $id)
    {
        $dataLk = BarangMasukDatalayout::with('BarangMasukCsLK')->find($id);
        if ($request->file('file_corel_layout')) {
            $uploadFile = $request->file('file_corel_layout');
            $originalFileName = $uploadFile->getClientOriginalName();
            $filebajuplayer = $uploadFile->storeAs('file-dari-layout', $originalFileName, 'public');
        }

        $dataLk->update([
            'selesai' => Carbon::now(),
            'panjang_kertas' => $request->panjang_kertas,
            'file_corel_layout' => $filebajuplayer,
            'tanda_telah_mengerjakan' => 1,
        ]);

        return redirect()->route('getIndexLkLayoutPegawai')->with('success', 'Selamat data yang anda input telah terkirim!');
    }

    // public function showDataLaporanLk($id)
    // {
    //     $show = LaporanLkLayout::with('UserLayout', 'BarangMasukCsLK')->find($id);

    //     // return response()->json($show);
    //     return view('component.Layout.layout-lk-pegawai.show-laporan-lk', compact('show'));
    // }
}
