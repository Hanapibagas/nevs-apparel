<?php

namespace App\Http\Controllers\Cs;

use App\Http\Controllers\Controller;
use App\Models\BarangMasukCostumerServices;
use App\Models\BarangMasukDisainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostumerServicesController extends Controller
{
    public function getIndexCs()
    {
        $auth = Auth::user();
        $users = User::where('roles', 'disainer')->get();

        $cs = BarangMasukCostumerServices::where('cs_id', $auth->id)->with('BarangMasukDisainer', 'Users')->get();

        // return response()->json($cs);

        $userCounts = [];
        foreach ($users as $user) {
            $userId = $user->id;
            $barangMasukCount = BarangMasukDisainer::where('users_id', $userId)->count();
            $userCounts[$userId] = $barangMasukCount;
        }

        return view('component.costumer-service-pegawai.index', compact('users', 'userCounts', 'cs'));
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
}
