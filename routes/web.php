<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AK1Controller;
use App\Http\Controllers\Auth\AuthController;

Route::get('/login', [AuthController::class, 'index']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

Route::get('/', function () {
    return view('dashboard', ['show_logo' => 'show']);
});

Route::get('/ak1', [AK1Controller::class, 'index']);
Route::post('/ak1/add-kuesioner', [AK1Controller::class, 'store']);
