<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuesionerController;

Route::get('/login', [AuthController::class, 'index']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

// Route::get('/', function () {
//     return view('dashboard', ['show_logo' => 'show']);
// });

Route::get('/', [DashboardController::class, 'index']);
Route::get('/data-grafik-bar', [DashboardController::class, 'dataGrafikBar']);
Route::get('/dashboard-filter-layanan/{id_layanan}', [DashboardController::class, 'filterByLayanan']);


Route::get('/kuesioner/ak1', [KuesionerController::class, 'ak1']);
Route::get('/kuesioner/rekom-passport', [KuesionerController::class, 'rekomPassport']);
Route::get('/kuesioner/pelatihan', [KuesionerController::class, 'pelatihan']);
Route::get('/kuesioner/lpk', [KuesionerController::class, 'lpk']);
Route::get('/kuesioner/pencatatan-perusahaan', [KuesionerController::class, 'pencatatanPerusahaan']);
Route::get('/kuesioner/perselisihan-hubungan-industrial', [KuesionerController::class, 'perselisihanHubunganIndustrial']);


Route::post('/kuesioner/add-kuesioner', [KuesionerController::class, 'store']);
