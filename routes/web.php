<?php
use App\Models\TgsTambahan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PegawaiExport;
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

Route::get('/export-pegawai', function () {
    return Excel::download(new PegawaiExport, 'pegawai.xlsx');
});
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.action');

Route::get('/dashboard', [DashboardController::class, 'coba'])->name('coba');
Route::prefix('admin')
   
    ->name('admin.')
    ->group(function () {
        Route::get('jenisptk/lists', [JenisPTKController::class, 'lists'])->name('jenisptk.lists');
        Route::resource('jenisptk', JenisPTKController::class);
        Route::get('jenistggl/lists', [JenisTinggalController::class, 'lists'])->name('jenistggl.lists');
        Route::resource('jenistggl', JenisTinggalController::class);
        Route::get('kebkhusus/lists', [KebKhususController::class, 'lists'])->name('kebkhusus.lists');
        Route::resource('kebkhusus', KebKhususController::class);
        Route::get('statkawin/lists', [StatusKawinController::class, 'lists'])->name('statkawin.lists');
        Route::resource('statkawin', StatusKawinController::class);
        Route::get('statpeg/lists', [StatusPegawaiController::class, 'lists'])->name('statpeg.lists');
        Route::resource('statpeg', StatusPegawaiController::class);
        Route::get('tgstambahan/lists', [TgsTambahanController::class, 'lists'])->name('tgstambahan.lists');
        Route::resource('tgstambahan', TgsTambahanController::class);
        Route::get('provinsi/lists', [ProvinsiController::class, 'lists'])->name('provinsi.lists');
        Route::resource('provinsi', ProvinsiController::class);
        Route::get('kabupaten/lists', [KabupatenController::class, 'lists'])->name('kabupaten.lists');
        Route::resource('kabupaten', KabupatenController::class);
        Route::get('kecamatan/lists', [KecamatanController::class, 'lists'])->name('kecamatan.lists');
        Route::resource('kecamatan', KecamatanController::class);
        Route::get('kelurahan/lists', [KelurahanController::class, 'lists'])->name('kelurahan.lists');
        Route::resource('kelurahan', KelurahanController::class);
        Route::get('sumbergaji/lists', [SumberGajiController::class, 'lists'])->name('sumbergaji.lists');
        Route::resource('sumbergaji', SumberGajiController::class);
        Route::get('transportasi/lists', [TransportasiController::class, 'lists'])->name('transportasi.lists');
        Route::resource('transportasi', TransportasiController::class);
        Route::get('pangkat/lists', [PangkatController::class, 'lists'])->name('pangkat.lists');
        Route::resource('pangkat', PangkatController::class);
        Route::get('bank/lists', [BankController::class, 'lists'])->name('bank.lists');
        Route::resource('bank', BankController::class);
        Route::get('jurusan/list', [JurusanController::class, 'lists'])->name('jurusan.lists');
        Route::resource('jurusan', JurusanController::class);
        Route::get('rombel/list', [RombelController::class, 'lists'])->name('rombel.lists');
        Route::resource('rombel', RombelController::class);
        Route::get('role/list', [RoleController::class, 'lists'])->name('role.lists');
        Route::resource('role', RoleController::class);
        Route::get('user/list', [UserController::class, 'lists'])->name('user.lists');
        Route::resource('user', UserController::class);
        Route::get('agama/lists', [AgamaController::class, 'lists'])->name('agama.lists');
        Route::resource('agama', AgamaController::class);
        Route::get('pekerjaan/lists', [PekerjaanController::class, 'lists'])->name('pekerjaan.lists');
        Route::resource('pekerjaan', PekerjaanController::class);
        Route::get('pendidikan/lists', [PendidikanController::class, 'lists'])->name('pendidikan.lists');
        Route::resource('pendidikan', PendidikanController::class);
        Route::get('penghasilan/lists', [PenghasilanController::class, 'lists'])->name('penghasilan.lists');
        Route::resource('penghasilan', PenghasilanController::class);
        Route::get('prgbantuan/lists', [PrgbantuanController::class, 'lists'])->name('prgbantuan.lists');
        Route::resource('prgbantuan', PrgbantuanController::class);
        Route::get('pegawai/list', [PegawaiController::class, 'lists'])->name('pegawai.lists');
        Route::resource('pegawai', PegawaiController::class);
        Route::get('krtbantuan/list', [KrtBantuanController::class, 'lists'])->name('krtbantuan.lists');
        Route::resource('krtbantuan', KrtBantuanController::class);
        Route::get('sekolah/list', [SekolahController::class, 'lists'])->name('sekolah.lists');
        Route::resource('sekolah', SekolahController::class);
        Route::get('siswa/list', [SiswaController::class, 'lists'])->name('siswa.lists');
        Route::resource('siswa', SiswaController::class);

        //Route resource sudah memuat segala bentuk method fungsi di web.php, cnth (edit,store,destroy,dll.)
    });

