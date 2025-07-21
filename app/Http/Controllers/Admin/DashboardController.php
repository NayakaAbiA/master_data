<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Rombel;
use App\Models\Jurusan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahGuru = Pegawai::count();
        $jumlahLaki_peg = Pegawai::where('jenis_kelamin', 'L')->count();
        $jumlahPerempuan_peg = Pegawai::where('jenis_kelamin', 'P')->count();
        $jumlahPNS = Pegawai::where('id_stat_peg', 1)->count();
        $jumlahPPPK = Pegawai::where('id_stat_peg', 2)->count();
        $jumlahHonorer = Pegawai::where('id_stat_peg', 3)->count();

        $jumlahSiswa = Siswa::count();
        $jumlahLaki_sis = Siswa::where('jenis_kelamin', 'L')->count();
        $jumlahPerempuan_sis = Siswa::where('jenis_kelamin', 'P')->count();
        $jumlahKelasX = Siswa::whereHas('rombel', function ($query) {
            $query->where('nama', 'like', 'X%');
        })->count();
        $jumlahKelasXI = Siswa::whereHas('rombel', function ($query) {
            $query->where('nama', 'like', 'XI%');
        })->count();
        $jumlahKelasXII = Siswa::whereHas('rombel', function ($query) {
            $query->where('nama', 'like', 'XII%');
        })->count();
        

        $jumlahRombel = Rombel::count();
        $jumlahJurusan = Jurusan::count();
       $konsentrasiKeahlian = DB::table('tb_rombel')
    ->select(DB::raw("SUBSTRING_INDEX(SUBSTRING_INDEX(nama_rombel, ' ', 2), ' ', -1) as jurusan"))
    ->get()
    ->pluck('jurusan')
    ->unique()
    ->count();

        $user = Auth::user();
        $ptk = $user->ptk;
        if ($ptk) {
            $rombels = Rombel::where('id_ptk_walas', $ptk->id)->get();
        } else {
            $rombels = collect(); // koleksi kosong
        }

        return view('Admin.dashboard', 
        compact('jumlahGuru','jumlahSiswa','jumlahRombel',
        'jumlahJurusan','rombels','jumlahLaki_peg','jumlahPerempuan_peg',
        'jumlahPNS', 'jumlahPPPK', 'jumlahHonorer','jumlahLaki_sis','jumlahPerempuan_sis',
        'jumlahKelasX','jumlahKelasXI','jumlahKelasXII', 'konsentrasiKeahlian'
    ));
    }
}
