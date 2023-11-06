<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::middleware('auth', 'checkroll:super_admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('indexHome');
    // route admin cs
    Route::get('/costumer-service', [HomeController::class, 'getCostumerSevices'])->name('getIndexCs');
    Route::post('/costumer-service/update', [HomeController::class, 'postUpdatePirmission'])->name('postPirmission');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
