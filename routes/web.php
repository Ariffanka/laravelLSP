<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\IndexController;
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
    Route::get('/', 'index');
    Route::post('/login_admin', 'login_admin');
    Route::post('/login_guru', 'login_guru');
    Route::post('/login_siswa', 'login_siswa');
    Route::get('/home', 'home');
    Route::get('/logout', 'logout');
});

Route::middleware('checkUserRole:admin')->group(function(){
    Route::controller(GuruController::class)->prefix('guru')->group(function(){
        Route::get('/index','index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{guru}', 'edit');
        Route::post('/update/{guru}', 'update');
        Route::get('/destroy/{guru}', 'destroy');
    });
});
