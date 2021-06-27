<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\Rumah_SakitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('layouts.home');
});

Route::get('/home', function () {
    return view('layouts.home');
});

Route::get('/about', function () {
    return view('layouts.about');
});

Route::resource('/dokter',DokterController::class)->middleware('auth');
Route::resource('/pasien',PasienController::class)->middleware('auth');
Route::resource('/rumah_sakit',Rumah_SakitController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/afterRegister', function () {
    return view('layouts.afterRegister');
});
