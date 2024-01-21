<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use App\Models\BarangMasukCostumerServices;
use App\Models\BarangMasukDatalayout;
use App\Models\LaporanLkLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class LayoutController extends Controller
{
    public function getIndexLkCs()
    {
        $user = Auth::user();
        $oderCs = BarangMasukDatalayout::with('UserLayout', 'BarangMasukCsLK')
            ->where('users_layout_id', $user->id)
            ->get();

        return view('component.Layout.layout-lk-pegawai.index', compact('oderCs'));
    }

    public function getIndexLaporanLk()
    {
        $user = Auth::user();
        $oderCs = BarangMasukDatalayout::with('UserLayout', 'BarangMasukCsLK')
            ->where('users_layout_id', $user->id)
            ->get();

        return view('component.Layout.layout-lk-pegawai.index-laporan-lk', compact('oderCs'));
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
        $dataLk = BarangMasukCostumerServices::find($id);

        return view('component.Layout.layout-lk-pegawai.cerate-laporan-lk', compact('dataLk'));
    }

    // public function postLaporanLk(Request $request)
    // {
    //     $user = Auth::user();

    //     if ($request->file('file_corel_layout')) {
    //         $uploadFile = $request->file('file_corel_layout');
    //         $originalFileName = $uploadFile->getClientOriginalName();
    //         $filebajuplayer = $uploadFile->storeAs('file-dari-layout', $originalFileName, 'public');
    //     }

    //     LaporanLkLayout::create([
    //         'users_layout_id' => $user->id,
    //         'no_order_id' => $request->no_order_id,
    //         'panjang_kertas' => $request->panjang_kertas,
    //         'file_corel_layout' => $filebajuplayer,
    //     ]);

    //     $updateLaporan = $request->no_order_id;
    //     BarangMasukCostumerServices::where('id', $updateLaporan)->update(['tanda_input_laporan' => 1]);

    //     return redirect()->route('getIndexLkLayoutPegawai')->with('success', 'Selamat data yang anda input telah terkirim!');
    // }

    // public function showDataLaporanLk($id)
    // {
    //     $show = LaporanLkLayout::with('UserLayout', 'BarangMasukCsLK')->find($id);

    //     // return response()->json($show);
    //     return view('component.Layout.layout-lk-pegawai.show-laporan-lk', compact('show'));
    // }
}
