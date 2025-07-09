<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('login',[UserController::class,'logincheck'])->name('logincheck');

Route::get('/register',[UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'registercheck'])->name('registercheck');

Route::get('/dashboard',[UserController::class,'goDashboard'])->name('dashboard');

Route::get('/logout', [UserController::class,'logout'])->name('logout');

Route::get('/galeriAdmin',[PhotoController::class, 'index'])->name('galeriAdmin');
Route::get('/admin/input',[PhotoController::class,'input'])->name('inputPhoto');
Route::post('/admin/storePhoto',[PhotoController::class,'store'])->name('storePhoto');