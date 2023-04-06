<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\SimulasiCucianController;
use App\Http\Controllers\LaporanbugController;



Route::get('/', [DashboardController::class, 'index']);
Route::get('simulasi', [SimulasiController::class, 'index']);
Route::resource('/siswa', SiswaController::class);
Route::resource('/tingkat', KelasController::class);
Route::resource('laporanbug', LaporanbugController::class);
Route::resource('/spp', SppController::class);
Route::resource('/pembayaran', PembayaranController::class);

//simulasi


Route::get('simulasi-cucian', [SimulasiCucianController::class, 'index'])->name('simulasi-cucian');

//bug
// Route::get('laporanbug', [LaporanbugController::class, 'index'])->name('laporanbug');
route::resource('laporanbug', LaporanbugController::class);
Route::get('export/laporanbug',[laporanbugController::class,'exportData']) ->name('export-laporanbug');
Route::post('laporanbug/import',[laporanbugController::class, 'importData'])->name('import-laporanbug');
//login
Route::get('/login',[UserController::class,'index'])->name('login');
