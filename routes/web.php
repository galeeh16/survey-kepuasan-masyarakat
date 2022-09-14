<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard', ['show_logo' => 'show']);
});

Route::get('/login', function() {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::get('/ak1', function () {
    return view('ak1.index');
});
