<?php

namespace App\Http\Controllers\Disainer;

use App\Http\Controllers\Controller;
use App\Models\BarangMasukMesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataMesinController extends Controller
{
    public function getDataMesinAtexco()
    {
        $user = Auth::user();
        $mesin = BarangMasukMesin::where('nama_mesin', 'atexco')->where('users_id', $user->id)->get();

        return view('component.data-mesin-atexco-disainer.index', compact('mesin'));
    }

    public function getDataMesinMimaki()
    {
        $user = Auth::user();
        $mesin = BarangMasukMesin::where('nama_mesin', 'mimaki')->where('users_id', $user->id)->get();

        return view('component.data-mesin-mimaki-disainer.index', compact('mesin'));
    }
}
