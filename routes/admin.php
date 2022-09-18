<?php 

use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\DashboardController;

/**
 * /admin
 */

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::group(['prefix' => 'layanan'], function() {
    Route::get('/', [LayananController::class, 'index']);
    Route::post('/get-list', [LayananController::class, 'getList']);
    Route::post('/', [LayananController::class, 'store']);
    Route::post('/delete', [LayananController::class, 'delete']);
    Route::post('/edit', [LayananController::class, 'edit']);
});