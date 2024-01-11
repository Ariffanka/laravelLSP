<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
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


Route::controller(IndexController::class)->group(function(){
    Route::get('/home', 'home');
    Route::get('/', 'index');
    Route::post('/login_admin', 'loginAdmin');
    Route::post('/login_guru', 'loginGuru');
    Route::post('/login_siswa', 'loginSiswa');
    Route::get('/logout', 'logout');
});

Route::middleware('checkUserRole:admin')->group(function(){
    Route::controller(GuruController::class)->prefix('/guru')->group(function(){
        Route::get('/index', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{guru}', 'edit');
        Route::post('/update/{guru}', 'update');
        Route::get('/destroy/{guru}', 'destroy');
    });
});


Route::middleware('checkUserRole:admin')->group(function(){
    Route::controller(MapelController::class)->prefix('/mapel')->group(function(){
        Route::get('/index', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{mapel}', 'edit');
        Route::post('/update/{mapel}', 'update');
        Route::get('/destroy/{mapel}', 'destroy');
    });
});

Route::middleware('checkUserRole:admin')->group(function(){
    Route::controller(KelasController::class)->prefix('/kelas')->group(function(){
        Route::get('/index', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{kelas}', 'edit');
        Route::post('/update/{kelas}', 'update');
        Route::get('/destroy/{kelas}', 'destroy');
    });
});
