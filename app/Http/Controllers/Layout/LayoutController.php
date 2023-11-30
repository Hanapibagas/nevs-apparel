<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use App\Models\BarangMasukCostumerServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    public function getIndexLkCs()
    {
        $user = Auth::user();
        $oderCs = BarangMasukCostumerServices::where('layout_id', $user->id)
            ->with('BarangMasukDisainer', 'Users', 'UsersOrder', 'UsersLk')
            ->where('tanda_telah_mengerjakan', 1)
            ->get();

        return view('component.Layout.layout-lk-pegawai.index', compact('oderCs'));
    }
}
