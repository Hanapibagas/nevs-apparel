<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('component.dashboard');
    }

    public function getCostumerSevices()
    {
        $userCs = User::where('roles', 'cs')->get();

        return view('component.costumer-service-admin.index', compact('userCs'));
    }

    public function postUpdatePirmission(Request $request)
    {
        foreach ($request->userCs as $userId => $permissions) {
            // Ambil user berdasarkan ID (pastikan $userId adalah ID yang sah)
            $user = User::find($userId);

            if ($user) {
                $user->update([
                    'permission_edit' => isset($permissions['permission_edit']) ? 1 : 0,
                    'permission_hapus' => isset($permissions['permission_hapus']) ? 1 : 0,
                    'permission_create' => isset($permissions['permission_create']) ? 1 : 0,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Permission telah diperbarui.');
    }
}
