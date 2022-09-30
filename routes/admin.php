<?php 

use App\Http\Controllers\Admin\JawabanController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KuesionerController;
use App\Http\Controllers\Admin\PertanyaanController;

/**
 * /admin
 */

Route::get('/dashboard', [DashboardController::class, 'index']);

// Route::resource('layanan', LayananController::class); // lebih suka pake yg bawah karena lebih jelas aja huehe

Route::group(['prefix' => 'layanan'], function () {
    Route::get('/', [LayananController::class, 'index']);
    Route::post('/get-list', [LayananController::class, 'getList']);
    Route::post('/', [LayananController::class, 'store']);
    Route::post('/delete', [LayananController::class, 'delete']);
    Route::post('/edit', [LayananController::class, 'edit']);
});

Route::group(['prefix' => 'pertanyaan'], function () {
    Route::get('/', [PertanyaanController::class, 'index']);
    Route::get('/{id}', [PertanyaanController::class, 'show']);
    Route::post('/', [PertanyaanController::class, 'store']);
    Route::put('/{id}', [PertanyaanController::class, 'update']); 
    Route::post('/get-list', [PertanyaanController::class, 'getList']);
    Route::delete('/{id}', [PertanyaanController::class, 'destroy']);
});

Route::group(['prefix' => 'jawaban'], function () {
    Route::get('/', [JawabanController::class, 'index']);
    Route::post('/', [JawabanController::class, 'store']);
    Route::post('/get-list', [JawabanController::class, 'getList']);
    Route::put('/{id}', [JawabanController::class, 'update']);
    Route::delete('/{id}', [JawabanController::class, 'destroy']);
});

Route::group(['prefix' => 'kuesioner'], function () {
    Route::get('/', [KuesionerController::class, 'index']);
    Route::get('/{id}', [KuesionerController::class, 'show']);
    Route::post('/get-list', [KuesionerController::class, 'getList']);
});