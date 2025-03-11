<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'user'])->name('login');
Route::get('/auth', [LoginController::class, 'admin']);
Route::post('/check', [LoginController::class, 'check']);
Route::post('/verif', [LoginController::class, 'verif']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/**
 * HALAMAN KANDIDAT
 * /admin/kandidat
 */
Route::prefix('/admin')->middleware(['LoginAdmin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin'); //Dashboard

    /**
     * HALAMAN KANDIDAT
     * /admin/kandidat
     */
    Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat.index');
    Route::get('/kandidat/tambah', [KandidatController::class, 'tambahKandidat'])->name('kandidat.tambah');
    Route::post('/kandidat/store', [KandidatController::class, 'simpanKandidat'])->name('kandidat.store');
    Route::get('/kandidat/edit/{id_kandidat}', [KandidatController::class, 'editKandidat'])->name('kandidat.edit');
    Route::put('/kandidat/update/{id_kandidat}', [KandidatController::class, 'updateKandidat'])->name('kandidat.update');
    Route::delete('/kandidat/hapus/{id_kandidat}', [KandidatController::class, 'hapusKandidat'])->name('kandidat.hapus');

    /**
     * Halaman Data Akun
     * Include CRUD data dari model UserModel
     */
    Route::get('/akun',[AkunController::class,'user'])->name('akun.user');
});

Route::prefix('/user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
});
