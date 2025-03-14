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
Route::prefix('/admin')->middleware(['LoginAdmin:Admin,Super Admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin'); //Dashboard
    
    Route::get('/form-admin',[AdminController::class,'formAdmin'])->name('form.admin');
    Route::get('/modif-admin/{id}',[AdminController::class,'modifAdmin'])->name('form.admin');
    Route::post('/admin/tambah',[AdminController::class,'tambahAdmin'])->middleware(['LoginAdmin:Super Admin'])->name('admin.tambah');
    Route::post('/admin/edit/{id}',[AdminController::class,'editAdmin'])->middleware(['LoginAdmin:Super Admin'])->name('admin.edit');
    Route::post('/admin/hapus/{id}',[AdminController::class,'hapus'])->middleware(['LoginAdmin:Super Admin'])->name('admin.hapus');

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
    Route::get('/form',[AkunController::class,'formUser'])->name('form.user');
    Route::get('/modif/{id}',[AkunController::class,'modifUser'])->name('modif.user');
    Route::post('/user/tambah',[AkunController::class,'tambahUser'])->name('tambah.user');
    Route::post('/user/edit/{id}',[AkunController::class,'editUser'])->name('edit.user');
    Route::post('/user/hapus/{id}',[AkunController::class,'hapus'])->name('hapus.user');

});

Route::prefix('/user')->middleware(['LoginUser'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
});
