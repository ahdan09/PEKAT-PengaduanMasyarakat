<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Petugas;



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
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('user')->middleware('auth')->group(function () {
    Route::resource('pengaduan', MasyarakatController::class);
    Route::get('/lihat', [MasyarakatController::class,'lihat'])->name('lihat.pengaduan');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/pengaduan/{id}', [AdminController::class,'index'])->name('admin.pengaduan.index');
        Route::get('/admin/laporan/cetak', [AdminController::class,'cetak'])->name('admin.laporan.cetak');
        Route::resource('users', UserController::class);
        Route::get('user/export', [UserController::class, 'export'])->name('user.export');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::middleware(['petugas'])->group(function () {
        Route::resource('tanggapan', TanggapanController::class);
        Route::resource('pengaduans', PengaduanController::class);
    });

    Route::get('/admin/pengaduan/{id}', [AdminController::class,'index'])->name('admin.pengaduan.index');
    Route::get('/admin/laporan/cetak', [AdminController::class,'cetak'])->name('admin.laporan.cetak');
    Route::resource('tanggapan', TanggapanController::class);
    Route::resource('pengaduans', PengaduanController::class);

});



require __DIR__.'/auth.php';
