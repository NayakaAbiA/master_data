<?php
use App\Models\TgsTambahan;
use App\Exports\SiswaExport;
use App\Exports\PegawaiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AgamaController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\RombelController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\PangkatController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\SekolahController;
use App\Http\Controllers\Admin\JenisPTKController;
use App\Http\Controllers\Admin\ProvinsiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KabupatenController;
use App\Http\Controllers\Admin\KebKhususController;
use App\Http\Controllers\Admin\KecamatanController;
use App\Http\Controllers\Admin\KelurahanController;
use App\Http\Controllers\Admin\PekerjaanController;
use App\Http\Controllers\Admin\KrtBantuanController;
use App\Http\Controllers\Admin\PendidikanController;
use App\Http\Controllers\Admin\PrgbantuanController;
use App\Http\Controllers\Admin\SumberGajiController;
use App\Http\Controllers\Admin\PenghasilanController;
use App\Http\Controllers\Admin\StatusKawinController;
use App\Http\Controllers\Admin\TgsTambahanController;
use App\Http\Controllers\Admin\JenisTinggalController;
use App\Http\Controllers\Admin\TransportasiController;
use App\Http\Controllers\Admin\StatusPegawaiController;
use App\Http\Controllers\PerbaikanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('landingpage');
});
Route::get('/export-siswa', function () {
    return Excel::download(new SiswaExport, 'siswa.xlsx');
});
Route::get('/export-pegawai', function () {
    return Excel::download(new PegawaiExport, 'pegawai.xlsx');
});
Route::get('/export-pegawai', function () {
    return Excel::download(new PegawaiExport, 'pegawai.xlsx');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login/action', [LoginController::class, 'store'])->name('login.action');

Route::prefix('admin')
    ->middleware(['auth'])   // hanya middleware auth tanpa pengecualian role
    ->name('admin.')
    ->group(function () {
        // Semua route admin yang bisa diakses semua user yang login
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/provinsi/template', [ProvinsiController::class, 'downloadTemplate'])->name('provinsi.downloadTemplate');
        Route::get('provinsi/lists', [ProvinsiController::class, 'lists'])->name('provinsi.lists');
        Route::resource('provinsi', ProvinsiController::class);
        Route::post('provinsi-import', [ProvinsiController::class, 'import'])->name('provinsi.import');

        Route::get('/kabupaten/template', [KabupatenController::class, 'downloadTemplate'])->name('kabupaten.downloadTemplate');
        Route::get('kabupaten/lists', [KabupatenController::class, 'lists'])->name('kabupaten.lists');
        Route::resource('kabupaten', KabupatenController::class);
        Route::post('kabupaten-import', [KabupatenController::class, 'import'])->name('kabupaten.import');

        Route::get('/kecamatan/template', [KecamatanController::class, 'downloadTemplate'])->name('kecamatan.downloadTemplate');
        Route::get('kecamatan/lists', [KecamatanController::class, 'lists'])->name('kecamatan.lists');
        Route::resource('kecamatan', KecamatanController::class);
        Route::post('kecamatan-import', [KecamatanController::class, 'import'])->name('kecamatan.import');

        Route::get('/kelurahan/template', [KelurahanController::class, 'downloadTemplate'])->name('kelurahan.downloadTemplate');
        Route::get('kelurahan/lists', [KelurahanController::class, 'lists'])->name('kelurahan.lists');
        Route::resource('kelurahan', KelurahanController::class);
        Route::post('kelurahan-import', [kelurahanController::class, 'import'])->name('kelurahan.import');

        Route::get('bank/lists', [BankController::class, 'lists'])->name('bank.lists');
        Route::resource('bank', BankController::class);

        Route::get('agama/lists', [AgamaController::class, 'lists'])->name('agama.lists');
        Route::resource('agama', AgamaController::class);

        Route::get('pekerjaan/lists', [PekerjaanController::class, 'lists'])->name('pekerjaan.lists');
        Route::resource('pekerjaan', PekerjaanController::class);
        //  Hanya untuk Super Admin 
        Route::middleware('role:superAdmin')->group(function () {

            Route::get('sekolah/list', [SekolahController::class, 'lists'])->name('sekolah.lists');
            Route::resource('sekolah', SekolahController::class);

            Route::get('user/list', [UserController::class, 'lists'])->name('user.lists');
            Route::resource('user', UserController::class);

            Route::get('role/list', [RoleController::class, 'lists'])->name('role.lists');
            Route::resource('role', RoleController::class);            

        });
        //  Super Admin, Admin Siswa &pegawai
        Route::middleware('role:superAdmin,adminSiswa,pegawai')->group(function () {
            Route::get('siswa/list', [SiswaController::class, 'lists'])->name('siswa.lists');
            Route::get('/siswa/template', [SiswaController::class, 'downloadTemplate'])->name('siswa.downloadTemplate');
            Route::resource('siswa', SiswaController::class);
        });
        //  Super Admin, Admin Pegawai & pegawai
        Route::middleware('role:superAdmin,adminPegawai,pegawai')->group(function () {
            // Masukkan semua route yang admin_siswa tidak boleh akses, tapi admin_pegawai dan pegawai boleh

            Route::get('/pegawai/template', [PegawaiController::class, 'downloadTemplate'])->name('pegawai.downloadTemplate');
            Route::get('pegawai/list', [PegawaiController::class, 'lists'])->name('pegawai.lists');
            Route::resource('pegawai', PegawaiController::class);
        });
        //  Super Admin & Admin Pegawai 
        Route::middleware('role:superAdmin,adminPegawai')->group(function () {
            Route::post('pegawai-import', [PegawaiController::class, 'import'])->name('pegawai.import');

            Route::get('pangkat/lists', [PangkatController::class, 'lists'])->name('pangkat.lists');
            Route::resource('pangkat', PangkatController::class);

            Route::get('jenisptk/lists', [JenisPTKController::class, 'lists'])->name('jenisptk.lists');
            Route::resource('jenisptk', JenisPTKController::class);

            Route::get('statkawin/lists', [StatusKawinController::class, 'lists'])->name('statkawin.lists');
            Route::resource('statkawin', StatusKawinController::class);

            Route::get('statpeg/lists', [StatusPegawaiController::class, 'lists'])->name('statpeg.lists');
            Route::resource('statpeg', StatusPegawaiController::class);

            Route::get('sumbergaji/lists', [SumberGajiController::class, 'lists'])->name('sumbergaji.lists');
            Route::resource('sumbergaji', SumberGajiController::class);

            Route::get('tgstambahan/lists', [TgsTambahanController::class, 'lists'])->name('tgstambahan.lists');
            Route::resource('tgstambahan', TgsTambahanController::class);
        });

        Route::middleware('role:superAdmin,adminSiswa')->group(function () {
            Route::post('siswa-import', [SiswaController::class, 'import'])->name('siswa.import');
            Route::post('siswa-naikKelas', [SiswaController::class, 'naikKelas'])->name('siswa.naikKelas');

            Route::get('jurusan/list', [JurusanController::class, 'lists'])->name('jurusan.lists');
            Route::resource('jurusan', JurusanController::class);

            Route::get('/rombel/template', [RombelController::class, 'downloadTemplate'])->name('rombel.downloadTemplate');
            Route::get('rombel/list', [RombelController::class, 'lists'])->name('rombel.lists');
            Route::resource('rombel', RombelController::class);
            Route::post('rombel-import', [RombelController::class, 'import'])->name('rombel.import');

            Route::get('jenistggl/lists', [JenisTinggalController::class, 'lists'])->name('jenistggl.lists');
            Route::resource('jenistggl', JenisTinggalController::class);

            Route::get('transportasi/lists', [TransportasiController::class, 'lists'])->name('transportasi.lists');
            Route::resource('transportasi', TransportasiController::class);

            Route::get('pendidikan/lists', [PendidikanController::class, 'lists'])->name('pendidikan.lists');
            Route::resource('pendidikan', PendidikanController::class);

            Route::get('penghasilan/lists', [PenghasilanController::class, 'lists'])->name('penghasilan.lists');
            Route::resource('penghasilan', PenghasilanController::class);

            Route::get('krtbantuan/list', [KrtBantuanController::class, 'lists'])->name('krtbantuan.lists');
            Route::resource('krtbantuan', KrtBantuanController::class);

            Route::get('prgbantuan/lists', [PrgbantuanController::class, 'lists'])->name('prgbantuan.lists');
            Route::resource('prgbantuan', PrgbantuanController::class);

            Route::get('kebkhusus/lists', [KebKhususController::class, 'lists'])->name('kebkhusus.lists');
            Route::resource('kebkhusus', KebKhususController::class);
        });
        //  Pegawai
        Route::middleware('role:pegawai')->group(function () {
            Route::get('perbaikan/lists', [PerbaikanController::class, 'lists'])->name('perbaikan.lists');
            Route::resource('perbaikan', PerbaikanController::class);

        });
});

//Route resource sudah memuat segala bentuk method fungsi di web.php, cnth (edit,store,destroy,dll.)

