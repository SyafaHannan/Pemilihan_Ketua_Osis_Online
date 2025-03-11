<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LoginAdmin;
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
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::prefix('/admin')->middleware(['LoginAdmin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin');
});

Route::prefix('/user')->middleware(['LoginUser'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
});
