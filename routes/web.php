<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\JenisPTKController;
use App\Http\Controllers\Admin\JenisTinggalController;
use App\Http\Controllers\Admin\KebKhususController;
use App\Http\Controllers\Admin\ProvinsiController;
use App\Http\Controllers\Admin\StatusKawinController;
use App\Http\Controllers\Admin\StatusPegawaiController;
use App\Http\Controllers\Admin\TgsTambahanController;
use App\Models\TgsTambahan;
use Illuminate\Support\Facades\Route;

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

        //Route resource sudah memuat segala bentuk method fungsi di web.php, cnth (edit,store,destroy,dll.)
    });

