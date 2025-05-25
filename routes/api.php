<?php

use App\Http\Controllers\Api\AgamaController;
use App\Http\Controllers\Api\BankController;
use App\Http\Controllers\Api\JenisPTKController;
use App\Http\Controllers\Api\JenisTinggalController;
use App\Http\Controllers\Api\JurusanController;
use App\Http\Controllers\Api\KabupatenController;
use App\Http\Controllers\Api\KebKhususController;
use App\Http\Controllers\Api\KecamatanController;
use App\Http\Controllers\Api\KelurahanController;
use App\Http\Controllers\Api\KrtBantuanController;
use App\Http\Controllers\Api\PangkatController;
use App\Http\Controllers\Api\PegawaiController;
use App\Http\Controllers\Api\PekerjaanController;
use App\Http\Controllers\Api\PendidikanController;
use App\Http\Controllers\Api\PenghasilanController;
use App\Http\Controllers\Api\PrgbantuanController;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\RombelController;
use App\Http\Controllers\Api\SekolahController;
use App\Http\Controllers\Api\TransportasiController;
use App\Http\Controllers\Api\TgsTambahanController;
use App\Http\Controllers\Api\SumberGajiController;
use App\Http\Controllers\Api\StatusPegawaiController;
use App\Http\Controllers\Api\StatusKawinController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\Api\PerbaikanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::apiResource('agama', AgamaController::class);
Route::apiResource('bank', BankController::class);
Route::apiResource('jenisptk', JenisPTKController::class);
Route::apiResource('jnstinggal', JenisTinggalController::class);
Route::apiResource('jurusan', JurusanController::class);
Route::apiResource('kabupaten', KabupatenController::class);
Route::apiResource('kebkhusus', KebKhususController::class);
Route::apiResource('kecamatan', KecamatanController::class);
Route::apiResource('kelurahan', KelurahanController::class);
Route::apiResource('krtbantuan', KrtBantuanController::class);
Route::apiResource('pangkat', PangkatController::class);
Route::apiResource('pegawai', PegawaiController::class);
Route::apiResource('pekerjaan', PekerjaanController::class);
Route::apiResource('pendidikan', PendidikanController::class);
Route::apiResource('penghasilan', PenghasilanController::class);
Route::apiResource('prgbantuan', PrgbantuanController::class);
Route::apiResource('provinsi', ProvinsiController::class);
Route::apiResource('role', RoleController::class);
Route::apiResource('rombel', RombelController::class);
Route::apiResource('sekolah', SekolahController::class);
Route::apiResource('transportasi', TransportasiController::class);
Route::apiResource('tgstambahan', TgsTambahanController::class);
Route::apiResource('sumbergaji', SumberGajiController::class);
Route::apiResource('statpegawai', StatusPegawaiController::class);
Route::apiResource('statkawin', StatusKawinController::class);
Route::apiResource('user', UserController::class);
Route::apiResource('siswa', SiswaController::class);
Route::apiResource('perbaikan', PerbaikanController::class);
