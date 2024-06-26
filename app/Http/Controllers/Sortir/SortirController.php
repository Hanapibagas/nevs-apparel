<?php

namespace App\Http\Controllers\Sortir;

use App\Http\Controllers\Controller;
use App\Models\BahanCetak;
use App\Models\BahanKain;
use App\Models\DataSortir;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangMasukCostumerServices;
use App\Models\BarangMasukDatalayout;
use App\Models\LaporanCetakSortir;
use App\Models\LaporanKainSortir;
use PDF;
use Illuminate\Support\Facades\Storage;

class SortirController extends Controller
{
    public function getIndex()
    {
        $user = Auth::user();
        if ($user->asal_kota == 'makassar') {
            if (DataSortir::whereNotNull('laser_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 0)
                    ->whereHas('BarangMasukLaserCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            } else if (DataSortir::whereNotNull('manual_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 0)
                    ->whereHas('BarangMasukManualCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            }
        } elseif ($user->asal_kota == 'jakarta') {
            if (DataSortir::whereNotNull('laser_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 0)
                    ->whereHas('BarangMasukLaserCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            } else if (DataSortir::whereNotNull('manual_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 0)
                    ->whereHas('BarangMasukManualCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            }
        } elseif ($user->asal_kota == 'bandung') {
            if (DataSortir::whereNotNull('laser_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 0)
                    ->whereHas('BarangMasukLaserCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            } else if (DataSortir::whereNotNull('manual_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 0)
                    ->whereHas('BarangMasukManualCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            }
        } else {
            if (DataSortir::whereNotNull('laser_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 0)
                    ->whereHas('BarangMasukLaserCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            } else if (DataSortir::whereNotNull('manual_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 0)
                    ->whereHas('BarangMasukManualCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            }
        }

        return view('component.Sortir.index', compact('dataMasuk'));
    }

    public function getInputLaporan($id)
    {
        $dataMasuk = DataSortir::where('no_order_id', $id)->with('BarangMasukCs')->get();

        $bahanKertas = BahanCetak::all();
        $bahanKain = BahanKain::all();

        $formattedData = [];

        foreach ($dataMasuk as $item) {
            if ($item->lk_player_id) {
                $formattedData['player'][] = [
                    'id' => $item->id,
                ];
            } elseif ($item->lk_pelatih_id) {
                $formattedData['pelatih'][] = [
                    'id' => $item->id,
                ];
            } elseif ($item->lk_kiper_id) {
                $formattedData['kiper'][] = [
                    'id' => $item->id,
                ];
            } elseif ($item->lk_1_id) {
                $formattedData['lk_1'][] = [
                    'id' => $item->id,
                ];
            } elseif ($item->lk_celana_player_id) {
                $formattedData['celana_player'][] = [
                    'id' => $item->id,
                ];
            } elseif ($item->lk_celana_pelatih_id) {
                $formattedData['celana_pelatih'][] = [
                    'id' => $item->id,
                ];
            } elseif ($item->lk_celana_kiper_id) {
                $formattedData['celana_kiper'][] = [
                    'id' => $item->id,
                ];
            } elseif ($item->lk_celana_1_id) {
                $formattedData['celana_1'][] = [
                    'id' => $item->id,
                ];
            }
        }

        return view('component.Sortir.cerate-laporan-mesin', compact('dataMasuk', 'bahanKain', 'bahanKertas', 'formattedData'));
    }

    public function putLaporan(Request $request)
    {
        // return response()->json($request->all());
        $user = Auth::user();
        if ($request->player_id) {
            $dataMasukPlayer = DataSortir::with('BarangMasukCs')->find($request->player_id);

            if ($request->file('foto')) {
                $fileGambar = $request->file('foto')->store('sortir-player', 'public');
                if ($dataMasukPlayer->foto && file_exists(storage_path('app/public/' . $dataMasukPlayer->foto))) {
                    Storage::delete('public/' . $dataMasukPlayer->foto);
                    $fileGambar = $request->file('foto')->store('sortir-player', 'public');
                }
            }

            if ($request->file('foto') === null) {
                $fileGambar = $dataMasukPlayer->foto;
            }

            $localTime = $request->input('local_time');
            $selesaiTime = Carbon::parse($localTime);

            $dataMasukPlayer->update([
                'penanggung_jawab_id' => $user->id,
                'selesai' => $selesaiTime,
                'no_error' => $request->no_error,
                'panjang_kertas' => $request->panjang_kertas,
                'berat' => $request->berat,
                'bahan' => $request->bahan,
                'kertas_id' => $request->kertas_id,
                'cetak_id' => $request->kain_id,
                'keterangan' => $request->keterangan,
                'foto' =>  $fileGambar,
                'tanda_telah_mengerjakan' => 1
            ]);

            LaporanKainSortir::create([
                'layout_id' => $dataMasukPlayer->id,
                'kertas_id' => $request->kertas_id,
                'daerah' => $dataMasukPlayer->BarangMasukCs->kota_produksi,
                'total_kertas' => $request->panjang_kertas
            ]);

            LaporanCetakSortir::create([
                'press_kain_id' => $dataMasukPlayer->id,
                'kain_id' => $request->kain_id,
                'daerah' => $dataMasukPlayer->BarangMasukCs->kota_produksi,
                'total_kain' => $request->berat
            ]);
        }
        if ($request->pelatih_id) {
            $dataMasukPelatih = DataSortir::with('BarangMasukCs')->find($request->pelatih_id);

            if ($request->file('foto_pelatih')) {
                $fileGambar = $request->file('foto_pelatih')->store('sortir-pelatih', 'public');
                if ($dataMasukPelatih->foto_pelatih && file_exists(storage_path('app/public/' . $dataMasukPelatih->foto_pelatih))) {
                    Storage::delete('public/' . $dataMasukPelatih->foto_pelatih);
                    $fileGambar = $request->file('foto_pelatih')->store('sortir-pelatih', 'public');
                }
            }

            if ($request->file('foto_pelatih') === null) {
                $fileGambar = $dataMasukPelatih->foto_pelatih;
            }

            $localTime = $request->input('local_time');
            $selesaiTime = Carbon::parse($localTime);

            $dataMasukPelatih->update([
                'penanggung_jawab_id' => $user->id,
                'selesai' => $selesaiTime,
                'no_error_pelatih' => $request->no_error_pelatih,
                'panjang_kertas_pelatih' => $request->panjang_kertas_pelatih,
                'berat_pelatih' => $request->berat_pelatih,
                'bahan_pelatih' => $request->bahan_pelatih,
                'keterangan2' => $request->keterangan2,
                'kertas_id' => $request->kertas_id,
                'cetak_id' => $request->kain_id,
                'foto_pelatih' =>  $fileGambar,
                'tanda_telah_mengerjakan' => 1
            ]);

            LaporanKainSortir::create([
                'layout_id' => $dataMasukPelatih->id,
                'kertas_id' => $request->kertas_id,
                'daerah' => $dataMasukPelatih->BarangMasukCs->kota_produksi,
                'total_kertas' => $request->panjang_kertas
            ]);

            LaporanCetakSortir::create([
                'press_kain_id' => $dataMasukPelatih->id,
                'kain_id' => $request->kain_id,
                'daerah' => $dataMasukPelatih->BarangMasukCs->kota_produksi,
                'total_kain' => $request->berat
            ]);
        }
        if ($request->kiper_id) {
            $dataMasukKiper = DataSortir::with('BarangMasukCs')->find($request->kiper_id);

            if ($request->file('foto_kiper')) {
                $fileGambar = $request->file('foto_kiper')->store('sortir-kiper', 'public');
                if ($dataMasukKiper->foto_kiper && file_exists(storage_path('app/public/' . $dataMasukKiper->foto_kiper))) {
                    Storage::delete('public/' . $dataMasukKiper->foto_kiper);
                    $fileGambar = $request->file('foto_kiper')->store('sortir-kiper', 'public');
                }
            }

            if ($request->file('foto_kiper') === null) {
                $fileGambar = $dataMasukKiper->foto_kiper;
            }

            $localTime = $request->input('local_time');
            $selesaiTime = Carbon::parse($localTime);

            $dataMasukKiper->update([
                'penanggung_jawab_id' => $user->id,
                'selesai' => $selesaiTime,
                'no_error_kiper' => $request->no_error_kiper,
                'kertas_id' => $request->kertas_id,
                'cetak_id' => $request->kain_id,
                'panjang_kertas_kiper' => $request->panjang_kertas_kiper,
                'berat_kiper' => $request->berat_kiper,
                'bahan_kiper' => $request->bahan_kiper,
                'keterangan3' => $request->keterangan3,
                'foto_kiper' =>  $fileGambar,
                'tanda_telah_mengerjakan' => 1
            ]);

            LaporanKainSortir::create([
                'layout_id' => $dataMasukKiper->id,
                'kertas_id' => $request->kertas_id,
                'daerah' => $dataMasukKiper->BarangMasukCs->kota_produksi,
                'total_kertas' => $request->panjang_kertas
            ]);

            LaporanCetakSortir::create([
                'press_kain_id' => $dataMasukKiper->id,
                'kain_id' => $request->kain_id,
                'daerah' => $dataMasukKiper->BarangMasukCs->kota_produksi,
                'total_kain' => $request->berat
            ]);
        }
        if ($request->lk1_id) {
            $dataMasuk1 = DataSortir::with('BarangMasukCs')->find($request->lk1_id);

            if ($request->file('foto_1')) {
                $fileGambar = $request->file('foto_1')->store('sortir-1', 'public');
                if ($dataMasuk1->foto_1 && file_exists(storage_path('app/public/' . $dataMasuk1->foto_1))) {
                    Storage::delete('public/' . $dataMasuk1->foto_1);
                    $fileGambar = $request->file('foto_1')->store('sortir-1', 'public');
                }
            }

            if ($request->file('foto_1') === null) {
                $fileGambar = $dataMasuk1->foto_1;
            }

            $localTime = $request->input('local_time');
            $selesaiTime = Carbon::parse($localTime);

            $dataMasuk1->update([
                'penanggung_jawab_id' => $user->id,
                'selesai' => $selesaiTime,
                'no_error_1' => $request->no_error_1,
                'panjang_kertas_1' => $request->panjang_kertas_1,
                'berat_1' => $request->berat_1,
                'kertas_id' => $request->kertas_id,
                'cetak_id' => $request->kain_id,
                'bahan_1' => $request->bahan_1,
                'keterangan4' => $request->keterangan4,
                'foto_1' =>  $fileGambar,
                'tanda_telah_mengerjakan' => 1
            ]);

            LaporanKainSortir::create([
                'layout_id' => $dataMasuk1->id,
                'kertas_id' => $request->kertas_id,
                'daerah' => $dataMasuk1->BarangMasukCs->kota_produksi,
                'total_kertas' => $request->panjang_kertas
            ]);

            LaporanCetakSortir::create([
                'press_kain_id' => $dataMasuk1->id,
                'kain_id' => $request->kain_id,
                'daerah' => $dataMasuk1->BarangMasukCs->kota_produksi,
                'total_kain' => $request->berat
            ]);
        }
        if ($request->celana_player_id) {
            $dataMasukCelanaPlayer = DataSortir::with('BarangMasukCs')->find($request->celana_player_id);

            if ($request->file('foto_celana_pelayer')) {
                $fileGambar = $request->file('foto_celana_pelayer')->store('sortir-celana-player', 'public');
                if ($dataMasukCelanaPlayer->foto_celana_pelayer && file_exists(storage_path('app/public/' . $dataMasukCelanaPlayer->foto_celana_pelayer))) {
                    Storage::delete('public/' . $dataMasukCelanaPlayer->foto_celana_pelayer);
                    $fileGambar = $request->file('foto_celana_pelayer')->store('sortir-celana-player', 'public');
                }
            }

            if ($request->file('foto_celana_pelayer') === null) {
                $fileGambar = $dataMasukCelanaPlayer->foto_celana_pelayer;
            }

            $localTime = $request->input('local_time');
            $selesaiTime = Carbon::parse($localTime);

            $dataMasukCelanaPlayer->update([
                'penanggung_jawab_id' => $user->id,
                'selesai' => $selesaiTime,
                'no_error_celana_pelayer' => $request->no_error_celana_pelayer,
                'panjang_kertas_celana_pelayer' => $request->panjang_kertas_celana_pelayer,
                'berat_celana_pelayer' => $request->berat_celana_pelayer,
                'kertas_id' => $request->kertas_id,
                'cetak_id' => $request->kain_id,
                'bahan_celana_pelayer' => $request->bahan_celana_pelayer,
                'keterangan5' => $request->keterangan5,
                'foto_celana_pelayer' =>  $fileGambar,
                'tanda_telah_mengerjakan' => 1
            ]);

            LaporanKainSortir::create([
                'layout_id' => $dataMasukCelanaPlayer->id,
                'kertas_id' => $request->kertas_id,
                'daerah' => $dataMasukCelanaPlayer->BarangMasukCs->kota_produksi,
                'total_kertas' => $request->panjang_kertas
            ]);

            LaporanCetakSortir::create([
                'press_kain_id' => $dataMasukCelanaPlayer->id,
                'kain_id' => $request->kain_id,
                'daerah' => $dataMasukCelanaPlayer->BarangMasukCs->kota_produksi,
                'total_kain' => $request->berat
            ]);
        }
        if ($request->celana_pelatih_id) {
            $dataMasukCelanaPelatih = DataSortir::with('BarangMasukCs')->find($request->celana_pelatih_id);

            if ($request->file('foto_celana_pelatih')) {
                $fileGambar = $request->file('foto_celana_pelatih')->store('sortir-celana-pelatih', 'public');
                if ($dataMasukCelanaPelatih->foto_celana_pelatih && file_exists(storage_path('app/public/' . $dataMasukCelanaPelatih->foto_celana_pelatih))) {
                    Storage::delete('public/' . $dataMasukCelanaPelatih->foto_celana_pelatih);
                    $fileGambar = $request->file('foto_celana_pelatih')->store('sortir-celana-pelatih', 'public');
                }
            }

            if ($request->file('foto_celana_pelatih') === null) {
                $fileGambar = $dataMasukCelanaPelatih->foto_celana_pelatih;
            }

            $localTime = $request->input('local_time');
            $selesaiTime = Carbon::parse($localTime);

            $dataMasukCelanaPelatih->update([
                'penanggung_jawab_id' => $user->id,
                'selesai' => $selesaiTime,
                'no_error_celana_pelatih' => $request->no_error_celana_pelatih,
                'panjang_kertas_celana_pelatih' => $request->panjang_kertas_celana_pelatih,
                'berat_celana_pelatih' => $request->berat_celana_pelatih,
                'kertas_id' => $request->kertas_id,
                'cetak_id' => $request->kain_id,
                'bahan_celana_pelatih' => $request->bahan_celana_pelatih,
                'keterangan6' => $request->keterangan6,
                'foto_celana_pelatih' =>  $fileGambar,
                'tanda_telah_mengerjakan' => 1
            ]);

            LaporanKainSortir::create([
                'layout_id' => $dataMasukCelanaPelatih->id,
                'kertas_id' => $request->kertas_id,
                'daerah' => $dataMasukCelanaPelatih->BarangMasukCs->kota_produksi,
                'total_kertas' => $request->panjang_kertas
            ]);

            LaporanCetakSortir::create([
                'press_kain_id' => $dataMasukCelanaPelatih->id,
                'kain_id' => $request->kain_id,
                'daerah' => $dataMasukCelanaPelatih->BarangMasukCs->kota_produksi,
                'total_kain' => $request->berat
            ]);
        }
        if ($request->celana_kiper_id) {
            $dataMasukCelanaKiper = DataSortir::with('BarangMasukCs')->find($request->celana_kiper_id);

            if ($request->file('foto_celana_kiper')) {
                $fileGambar = $request->file('foto_celana_kiper')->store('sortir-celana-kiper', 'public');
                if ($dataMasukCelanaKiper->foto_celana_kiper && file_exists(storage_path('app/public/' . $dataMasukCelanaKiper->foto_celana_kiper))) {
                    Storage::delete('public/' . $dataMasukCelanaKiper->foto_celana_kiper);
                    $fileGambar = $request->file('foto_celana_kiper')->store('sortir-celana-kiper', 'public');
                }
            }

            if ($request->file('foto_celana_kiper') === null) {
                $fileGambar = $dataMasukCelanaKiper->foto_celana_kiper;
            }

            $localTime = $request->input('local_time');
            $selesaiTime = Carbon::parse($localTime);

            $dataMasukCelanaKiper->update([
                'penanggung_jawab_id' => $user->id,
                'selesai' => $selesaiTime,
                'no_error_celana_kiper' => $request->no_error_celana_kiper,
                'panjang_kertas_celana_kiper' => $request->panjang_kertas_celana_kiper,
                'kertas_id' => $request->kertas_id,
                'cetak_id' => $request->kain_id,
                'berat_celana_kiper' => $request->berat_celana_kiper,
                'bahan_celana_kiper' => $request->bahan_celana_kiper,
                'keterangan7' => $request->keterangan7,
                'foto_celana_kiper' =>  $fileGambar,
                'tanda_telah_mengerjakan' => 1
            ]);

            LaporanKainSortir::create([
                'layout_id' => $dataMasukCelanaKiper->id,
                'kertas_id' => $request->kertas_id,
                'daerah' => $dataMasukCelanaKiper->BarangMasukCs->kota_produksi,
                'total_kertas' => $request->panjang_kertas
            ]);

            LaporanCetakSortir::create([
                'press_kain_id' => $dataMasukCelanaKiper->id,
                'kain_id' => $request->kain_id,
                'daerah' => $dataMasukCelanaKiper->BarangMasukCs->kota_produksi,
                'total_kain' => $request->berat
            ]);
        }
        if ($request->celana_1_id) {
            $dataMasukCelana1 = DataSortir::with('BarangMasukCs')->find($request->celana_1_id);

            if ($request->file('foto_celana_1')) {
                $fileGambar = $request->file('foto_celana_1')->store('sortir-celana-1', 'public');
                if ($dataMasukCelana1->foto_celana_1 && file_exists(storage_path('app/public/' . $dataMasukCelana1->foto_celana_1))) {
                    Storage::delete('public/' . $dataMasukCelana1->foto_celana_1);
                    $fileGambar = $request->file('foto_celana_1')->store('sortir-celana-1', 'public');
                }
            }

            if ($request->file('foto_celana_1') === null) {
                $fileGambar = $dataMasukCelana1->foto_celana_1;
            }

            $localTime = $request->input('local_time');
            $selesaiTime = Carbon::parse($localTime);

            $dataMasukCelana1->update([
                'penanggung_jawab_id' => $user->id,
                'selesai' => $selesaiTime,
                'no_error_celana_1' => $request->no_error_celana_1,
                'panjang_kertas_celana_1' => $request->panjang_kertas_celana_1,
                'kertas_id' => $request->kertas_id,
                'cetak_id' => $request->kain_id,
                'berat_celana_1' => $request->berat_celana_1,
                'bahan_celana_1' => $request->bahan_celana_1,
                'keterangan8' => $request->keterangan8,
                'foto_celana_1' =>  $fileGambar,
                'tanda_telah_mengerjakan' => 1
            ]);

            LaporanKainSortir::create([
                'layout_id' => $dataMasukCelana1->id,
                'kertas_id' => $request->kertas_id,
                'daerah' => $dataMasukCelana1->BarangMasukCs->kota_produksi,
                'total_kertas' => $request->panjang_kertas
            ]);

            LaporanCetakSortir::create([
                'press_kain_id' => $dataMasukCelana1->id,
                'kain_id' => $request->kain_id,
                'daerah' => $dataMasukCelana1->BarangMasukCs->kota_produksi,
                'total_kain' => $request->berat
            ]);
        }

        if ($dataMasukPlayer) {
            if ($request->player_id) {
            }
            $laporanPlayer = Laporan::where('barang_masuk_sortir_id', $request->player_id)->first();
            if ($laporanPlayer) {
                $laporanPlayer->update([
                    'status' => 'Jahit',
                ]);
            }
            if ($request->pelatih_id) {
                $laporanPelatih = Laporan::where('barang_masuk_sortir_id', $request->pelatih_id)->first();
                if ($laporanPelatih) {
                    $laporanPelatih->update([
                        'status' => 'Jahit',
                    ]);
                }
            }
            if ($request->kiper_id) {
                $laporanKiper = Laporan::where('barang_masuk_sortir_id', $request->kiper_id)->first();
                if ($laporanKiper) {
                    $laporanKiper->update([
                        'status' => 'Jahit',
                    ]);
                }
            }
            if ($request->lk1_id) {
                $laporan1 = Laporan::where('barang_masuk_sortir_id', $request->lk1_id)->first();
                if ($laporan1) {
                    $laporan1->update([
                        'status' => 'Jahit',
                    ]);
                }
            }
            if ($request->celana_player_id) {
                $laporanCelanaPlayer = Laporan::where('barang_masuk_sortir_id', $request->celana_player_id)->first();
                if ($laporanCelanaPlayer) {
                    $laporanCelanaPlayer->update([
                        'status' => 'Jahit',
                    ]);
                }
            }
            if ($request->celana_pelatih_id) {
                $laporanCelanaPelatih = Laporan::where('barang_masuk_sortir_id', $request->celana_pelatih_id)->first();
                if ($laporanCelanaPelatih) {
                    $laporanCelanaPelatih->update([
                        'status' => 'Jahit',
                    ]);
                }
            }
            if ($request->celana_kiper_id) {
                $laporanCelanaKiper = Laporan::where('barang_masuk_sortir_id', $request->celana_kiper_id)->first();
                if ($laporanCelanaKiper) {
                    $laporanCelanaKiper->update([
                        'status' => 'Jahit',
                    ]);
                }
            }
            if ($request->celana_1_id) {
                $laporanCelana1 = Laporan::where('barang_masuk_sortir_id', $request->celana_1_id)->first();
                if ($laporanCelana1) {
                    $laporanCelana1->update([
                        'status' => 'Jahit',
                    ]);
                }
            }
        }

        return redirect()->route('getIndexFixSortir')->with('success', 'Selamat data yang anda input telah terkirim!');
    }

    public function getIndexFix()
    {
        $user = Auth::user();
        if ($user->asal_kota == 'makassar') {
            if (DataSortir::whereNotNull('laser_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 1)
                    ->whereHas('BarangMasukLaserCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            } else if (DataSortir::whereNotNull('manual_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 1)
                    ->whereHas('BarangMasukManualCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            }
        } elseif ($user->asal_kota == 'jakarta') {
            if (DataSortir::whereNotNull('laser_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 1)
                    ->whereHas('BarangMasukLaserCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            } else if (DataSortir::whereNotNull('manual_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 1)
                    ->whereHas('BarangMasukManualCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            }
        } elseif ($user->asal_kota == 'bandung') {
            if (DataSortir::whereNotNull('laser_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 1)
                    ->whereHas('BarangMasukLaserCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            } else if (DataSortir::whereNotNull('manual_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 1)
                    ->whereHas('BarangMasukManualCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            }
        } else {
            if (DataSortir::whereNotNull('laser_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 1)
                    ->whereHas('BarangMasukLaserCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            } else if (DataSortir::whereNotNull('manual_cut_id')->exists()) {
                $dataMasuk = DataSortir::with('BarangMasukCs', 'BarangMasukManualCut', 'BarangMasukCs.BarangMasukDisainer')
                    ->where('tanda_telah_mengerjakan', 1)
                    ->whereHas('BarangMasukManualCut', function ($query) {
                        $query->whereNotNull('selesai');
                    })
                    ->whereHas('BarangMasukCs', function ($query) use ($user) {
                        $query->where('kota_produksi', 'Makassar');
                    })
                    ->get()
                    ->groupBy('no_order_id')
                    ->map(function ($group) {
                        return $group->first();
                    });
                $dataMasuk = $dataMasuk->values()->all();
            }
        }

        return view('component.Sortir.index-fix', compact('dataMasuk'));
    }

    public function cetakDataLk($id)
    {
        $dataLk = BarangMasukCostumerServices::with(
            'BarangMasukDisainer',
            'Users',
            'UsersOrder',
            'UsersLk',
            'Gambar',

            'BarangMasukCostumerServicesLkPlyer',
            'BarangMasukCostumerServicesLkPlyer.LenganPlayer',
            'BarangMasukCostumerServicesLkPlyer.KeraPlayer',

            'BarangMasukCostumerServicesLkPelatih',
            'BarangMasukCostumerServicesLkPelatih.LenganPelatih',
            'BarangMasukCostumerServicesLkPelatih.KeraPelatih',

            'BarangMasukCostumerServicesLkKiper',
            'BarangMasukCostumerServicesLkKiper.LenganKiper',
            'BarangMasukCostumerServicesLkKiper.KeraKiper',

            'BarangMasukCostumerServicesLk1',
            'BarangMasukCostumerServicesLk1.Lengan1',
            'BarangMasukCostumerServicesLk1.Kera1',

            'BarangMasukCostumerServicesLkCelanaPlyer',
            'BarangMasukCostumerServicesLkCelanaPlyer.KeraCelanaPlayer',
            'BarangMasukCostumerServicesLkCelanaPlyer.CelanaCelanaPlayer',

            'BarangMasukCostumerServicesLkCelanaPelatih',
            'BarangMasukCostumerServicesLkCelanaPelatih.KeraCelanapelatih',
            'BarangMasukCostumerServicesLkCelanaPelatih.CelanaCelanapelatih',

            'BarangMasukCostumerServicesLkCelanaKiper',
            'BarangMasukCostumerServicesLkCelanaKiper.CelanaCealanaKiper',
            'BarangMasukCostumerServicesLkCelanaKiper.KeraCealanaKiper',

            'BarangMasukCostumerServicesLkCelana1',
            'BarangMasukCostumerServicesLkCelana1.KeraCealana1',
            'BarangMasukCostumerServicesLkCelana1.CelanaCelana1',
        )->findOrFail($id);

        $layout = BarangMasukDatalayout::with('GamarTangkaplayar')->where('barang_masuk_id', $id)->get();

        // return response()->json($layout);
        view()->share('dataLk', $dataLk->BarangMasukDisainer->nama_tim);

        $pdf = PDF::loadview('component.Mesin.export-data-baju', compact('dataLk', 'layout'));
        $pdf->setPaper('A4', 'potrait');

        // return $pdf->stream('data-baju.pdf');
        $namaTimClean = preg_replace('/[^A-Za-z0-9\-]/', '', $dataLk->BarangMasukDisainer->nama_tim);
        return $pdf->stream($namaTimClean . '.pdf');
    }
}
