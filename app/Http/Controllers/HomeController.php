<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
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

        return view('component.Admin.costumer-service-admin.index', compact('userCs'));
    }

    public function getDesainer()
    {
        $userDesainer = User::where('roles', 'disainer')->get();

        return view('component.Admin.desainer-admin.index', compact('userDesainer'));
    }

    public function getLayout()
    {
        $userLaytout = User::where('roles', 'layout')->get();

        return view('component.Admin.layout-admin.index', compact('userLaytout'));
    }

    public function getMesinAtexco()
    {
        $userMesinAtexco = User::where('roles', 'atexco')->get();

        return view('component.Admin.mesin-atexco-admin.index', compact('userMesinAtexco'));
    }

    public function getMesinMimaki()
    {
        $userMimaki = User::where('roles', 'mimaki')->get();

        return view('component.Admin.mesin-mimaki-admin.index', compact('userMimaki'));
    }

    public function getPembagianLayout()
    {
        $userPembagianLayout = User::where('roles', 'pb')->get();

        return view('component.Admin.pembagian-layout-admin.index', compact('userPembagianLayout'));
    }

    public function postUpdatePirmission(Request $request)
    {
        for ($i = 0; $i < count($request->id); $i++) {
            $data[] = $request->id;
            $edit = $request->permission_edit[$request->id[$i]] == 'on' ? 1 : 0;
            $hapus = $request->permission_hapus[$request->id[$i]] == 'on' ? 1 : 0;
            $create = $request->permission_create[$request->id[$i]] == 'on' ? 1 : 0;
            $user = User::findOrFail($request->id[$i]);
            $user->update([
                'permission_edit' => $edit,
                'permission_hapus' => $hapus,
                'permission_create' => $create
            ]);
        }

        return redirect()->back()->with('success', 'Permission telah diperbarui.');
    }

    public function postPegawaiCs(Request $request)
    {
        $email = $request->input('email');
        if (User::where('email', $email)->exists()) {
            return redirect()->back()->with('error', 'Email Pegawai sudah ada mohon buat yang berbeda.');
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $email,
            'roles' => $request->input('roles'),
            'password' => bcrypt('12345678')
        ]);

        return redirect()->back()->with('success', 'Data pegawai telah ditambah.');
    }

    public function postPegawaiDesainer(Request $request)
    {
        $email = $request->input('email');
        if (User::where('email', $email)->exists()) {
            return redirect()->back()->with('error', 'Email Pegawai sudah ada mohon buat yang berbeda.');
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $email,
            'roles' => $request->input('roles'),
            'password' => bcrypt('12345678')
        ]);

        return redirect()->back()->with('success', 'Data pegawai telah ditambah.');
    }

    public function postPegawaiLayout(Request $request)
    {
        $email = $request->input('email');
        if (User::where('email', $email)->exists()) {
            return redirect()->back()->with('error', 'Email Pegawai sudah ada mohon buat yang berbeda.');
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $email,
            'roles' => $request->input('roles'),
            'password' => bcrypt('12345678')
        ]);

        return redirect()->back()->with('success', 'Data pegawai telah ditambah.');
    }

    public function getLaporan()
    {
        $laporans = Laporan::with(
            'BarangMasukCs.UsersOrder',
            'BarangMasukCs.Users',
            'BarangMasukCs.UsersLk',
            'BarangMasukCs.BarangMasukDisainer',
            'BarangMasukLayout',
            'BarangMasukLayout.UserLayout',
            'BarangMasukMesinAtexco',
            'BarangMasukMesinMimaki',
            'BarangMasukPressKain',
            'BarangMasukLaserCut',
            'BarangMasukManualcut',
            'BarangMasukSortir',
            'BarangMasukJahitBaju',
            'BarangMasukJahitCelana',
            'BarangMasukPressTag',
            'BarangMasukPacking',
        )->get();

        // return response()->json($laporans);
        return view('component.Admin.laporan-pengerjaan.index', compact('laporans'));
    }
}
