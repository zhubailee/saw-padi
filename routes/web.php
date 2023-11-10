<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubkriteriaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('home')->middleware('guest');

Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('/dashboard',[UserController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/logout',[UserController::class, 'logout'])->name('logout');
Route::post('/login/process',[UserController::class,'loginProcess'])->name('login.process');

Route::resource('/alternatif',AlternatifController::class)->except('show')->middleware('auth');
Route::resource('/kriteria',KriteriaController::class)->except('show')->middleware('auth');
Route::resource('/subkriteria',SubkriteriaController::class)->except('show')->middleware('auth');
Route::get('/hitung',[HitungController::class, 'hitung'])->name('hitung')->middleware('auth');
Route::post('/hitung/process',[HitungController::class,'hitungProcess'])->name('hitung.process')->middleware('auth');
Route::get('/hasil',[HitungController::class,'hasil'])->name('hasil')->middleware('auth');