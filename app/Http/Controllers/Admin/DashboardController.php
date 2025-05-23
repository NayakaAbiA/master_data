<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Siswa;
use App\Models\Rombel;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahGuru = Pegawai::count();
        $jumlahSiswa = Siswa::count();
        $jumlahRombel = Rombel::count();
        $jumlahJurusan = Jurusan::count();
        return view('Admin.dashboard', compact('jumlahGuru','jumlahSiswa','jumlahRombel','jumlahJurusan'));
    }
}
