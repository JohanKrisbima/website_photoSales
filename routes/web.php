<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('login',[UserController::class,'logincheck'])->name('logincheck');

Route::get('/register',[UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'registercheck'])->name('registercheck');

Route::get('/home',[UserController::class,'goHome'])->name('home');

Route::get('/logout', [UserController::class,'logout'])->name('logout');