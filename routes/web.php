<?php

use App\Http\Controllers\AdminController;
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
Route::prefix('/login')->group(function(){
    Route::get('/',[LoginController::class,'index'])->name('login');
    Route::post('/check',[LoginController::class,'login']);

});

Route::prefix('/admin')->group(function(){
    Route::get('/',[AdminController::class,'dashboard'])->name('admin');
    
});

Route::prefix('/user')->group(function(){
    Route::get('/',[UserController::class,'index'])->name('user');

});
