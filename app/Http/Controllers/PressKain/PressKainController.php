<?php

namespace App\Http\Controllers\PressKain;

use App\Http\Controllers\Controller;
use App\Models\DataPressKain;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PressKainController extends Controller
{
    public function getindexDataMasukPress()
    {
        $user = Auth::user();
        if ($user->asal_kota == 'makassar') {
            $dataMasuk = DataPressKain::with('BarangMasukCs', 'MesinAtexco', 'MesinMimaki', 'BarangMasukCs.BarangMasukDisainer')
                ->where(function ($query) {
                    $query->whereHas('MesinAtexco', function ($subquery) {
                        $subquery->whereNotNull('selesai');
                    })
                        ->orWhereHas('MesinMimaki', function ($query) {
                            $query->whereNotNull('selesai');
                        });
                })
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Makassar');
                })
                ->where('tanda_telah_mengerjakan', 0)
                ->get();
        } elseif ($user->asal_kota == 'jakarta') {
            $dataMasuk = DataPressKain::with('BarangMasukCs', 'MesinAtexco', 'MesinMimaki', 'BarangMasukCs.BarangMasukDisainer')
                ->where(function ($query) {
                    $query->whereHas('MesinAtexco', function ($subquery) {
                        $subquery->whereNotNull('selesai');
                    })
                        ->orWhereHas('MesinMimaki', function ($query) {
                            $query->whereNotNull('selesai');
                        });
                })
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Jakarta');
                })
                ->where('tanda_telah_mengerjakan', 0)
                ->get();
        } elseif ($user->asal_kota == 'bandung') {
            $dataMasuk = DataPressKain::with('BarangMasukCs', 'MesinAtexco', 'MesinMimaki', 'BarangMasukCs.BarangMasukDisainer')
                ->where(function ($query) {
                    $query->whereHas('MesinAtexco', function ($subquery) {
                        $subquery->whereNotNull('selesai');
                    })
                        ->orWhereHas('MesinMimaki', function ($query) {
                            $query->whereNotNull('selesai');
                        });
                })
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Bandung');
                })
                ->where('tanda_telah_mengerjakan', 0)
                ->get();
        } else {
            $dataMasuk = DataPressKain::with('BarangMasukCs', 'MesinAtexco', 'MesinMimaki', 'BarangMasukCs.BarangMasukDisainer')
                ->where(function ($query) {
                    $query->whereHas('MesinAtexco', function ($subquery) {
                        $subquery->whereNotNull('selesai');
                    })
                        ->orWhereHas('MesinMimaki', function ($query) {
                            $query->whereNotNull('selesai');
                        });
                })
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Surabaya');
                })
                ->where('tanda_telah_mengerjakan', 0)
                ->get();
        }

        return view('component.Press-Kain.index', compact('dataMasuk'));
    }

    public function getInputLaporan($id)
    {
        $dataMasuk = DataPressKain::with('BarangMasukCs')->find($id);
        return view('component.Press-Kain.cerate-laporan-mesin', compact('dataMasuk'));
    }

    public function putLaporan(Request $request, $id)
    {
        $user = Auth::user();
        $dataMasuk = DataPressKain::with('BarangMasukCs')->find($id);

        $dataMasuk->update([
            'penanggung_jawab_id' => $user->id,
            'selesai' => Carbon::now(),
            'kain' => $request->kain,
            'berat' => $request->berat,
            'tanda_telah_mengerjakan' => 1
        ]);

        if ($dataMasuk) {
            $laporan = Laporan::where('barang_masuk_presskain_id', $dataMasuk->id)->first();
            if ($laporan) {
                $laporan->update([
                    'status' => 'Laser Cut',
                ]);
            }
        }

        return redirect()->route('getindexDataMasukPress')->with('success', 'Selamat data yang anda input telah terkirim!');
    }

    public function getindexDataMasukPressFix()
    {
        $user = Auth::user();
        if ($user->asal_kota == 'makassar') {
            $dataMasuk = DataPressKain::with('BarangMasukCs', 'MesinAtexco', 'MesinMimaki', 'BarangMasukCs.BarangMasukDisainer')
                ->where(function ($query) {
                    $query->whereHas('MesinAtexco', function ($subquery) {
                        $subquery->whereNotNull('selesai');
                    })
                        ->orWhereHas('MesinMimaki', function ($query) {
                            $query->whereNotNull('selesai');
                        });
                })
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Makassar');
                })
                ->where('tanda_telah_mengerjakan', 1)
                ->get();
        } elseif ($user->asal_kota == 'jakarta') {
            $dataMasuk = DataPressKain::with('BarangMasukCs', 'MesinAtexco', 'MesinMimaki', 'BarangMasukCs.BarangMasukDisainer')
                ->where(function ($query) {
                    $query->whereHas('MesinAtexco', function ($subquery) {
                        $subquery->whereNotNull('selesai');
                    })
                        ->orWhereHas('MesinMimaki', function ($query) {
                            $query->whereNotNull('selesai');
                        });
                })
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Jakarta');
                })
                ->where('tanda_telah_mengerjakan', 1)
                ->get();
        } elseif ($user->asal_kota == 'bandung') {
            $dataMasuk = DataPressKain::with('BarangMasukCs', 'MesinAtexco', 'MesinMimaki', 'BarangMasukCs.BarangMasukDisainer')
                ->where(function ($query) {
                    $query->whereHas('MesinAtexco', function ($subquery) {
                        $subquery->whereNotNull('selesai');
                    })
                        ->orWhereHas('MesinMimaki', function ($query) {
                            $query->whereNotNull('selesai');
                        });
                })
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Bandung');
                })
                ->where('tanda_telah_mengerjakan', 1)
                ->get();
        } else {
            $dataMasuk = DataPressKain::with('BarangMasukCs', 'MesinAtexco', 'MesinMimaki', 'BarangMasukCs.BarangMasukDisainer')
                ->where(function ($query) {
                    $query->whereHas('MesinAtexco', function ($subquery) {
                        $subquery->whereNotNull('selesai');
                    })
                        ->orWhereHas('MesinMimaki', function ($query) {
                            $query->whereNotNull('selesai');
                        });
                })
                ->whereHas('BarangMasukCs', function ($query) use ($user) {
                    $query->where('kota_produksi', 'Surabaya');
                })
                ->where('tanda_telah_mengerjakan', 1)
                ->get();
        }

        return view('component.Press-Kain.index-fix', compact('dataMasuk'));
    }
}
