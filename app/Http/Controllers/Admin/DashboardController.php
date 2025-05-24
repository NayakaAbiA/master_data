<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Rombel;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahGuru = Pegawai::count();
        $jumlahSiswa = Siswa::count();
        $jumlahRombel = Siswa::count();
        $jumlahJurusan = Siswa::count();
        $user = Auth::user();
        $ptk = $user->ptk;
        $rombels = Rombel::where('id_ptk_walas', $ptk->id)->get();

        return view('Admin.dashboard', compact('jumlahGuru','jumlahSiswa','jumlahRombel','jumlahJurusan','rombels'));
    }
}
