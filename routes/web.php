<?php

use App\Models\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/aplicaciones', function () {
        return view('apps.index');
    })->name('apps.index');
});

Route::get('prueba', function(){
    return config('reverb');
});