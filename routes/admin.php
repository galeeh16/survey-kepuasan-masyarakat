<?php 

use App\Http\Controllers\Admin\JawabanController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PertanyaanController;

/**
 * /admin
 */

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::group(['prefix' => 'layanan'], function () {
    Route::get('/', [LayananController::class, 'index']);
    Route::post('/get-list', [LayananController::class, 'getList']);
    Route::post('/', [LayananController::class, 'store']);
    Route::post('/delete', [LayananController::class, 'delete']);
    Route::post('/edit', [LayananController::class, 'edit']);
});

Route::group(['prefix' => 'pertanyaan'], function () {
    Route::get('/', [PertanyaanController::class, 'index']);
    Route::post('/get-list', [PertanyaanController::class, 'getList']);
});

Route::group(['prefix' => 'jawaban'], function () {
    Route::get('/', [JawabanController::class, 'index']);
    Route::post('/get-list', [JawabanController::class, 'getList']);
});