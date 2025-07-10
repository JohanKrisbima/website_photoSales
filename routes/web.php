<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use App\Models\Photo;
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
Route::delete('/admin/deletePhoto/{id}',[PhotoController::class, 'destroy'])->name('photoDestroy');
Route::get('/admin/editPhoto/{id}',[PhotoController::class,'edit'])->name('editPhoto');
Route::put('/admin/updatePhoto/{id}',[PhotoController::class, 'update'])->name('updatePhoto');
