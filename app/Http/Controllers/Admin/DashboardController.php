<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Rombel;
use App\Models\Pegawai;
use App\Models\Jurusan;
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
        $jumlahJurusan = Jurusan::count();
        $user = Auth::user();
        $ptk = $user->ptk;
        if ($ptk) {
            $rombels = Rombel::where('id_ptk_walas', $ptk->id)->get();
        } else {
            $rombels = collect(); // koleksi kosong
        }

        return view('Admin.dashboard', compact('jumlahGuru','jumlahSiswa','jumlahRombel','jumlahJurusan','rombels'));
    }
}
