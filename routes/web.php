<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login',[AuthController::class,'showLogin'])->name('auth.login');

Route::post('/login', [AuthController::class,'doLogin'])->name('auth.doLogin');

Route::get('/register',[AuthController::class,'showRegister'])->name('auth.register');

Route::post('/register', [AuthController::class,'doRegister'])->name('auth.doRegister');

Route::post('/logout', [AuthController::class,'logout'])->name('auth.logout');

Route::get('/dashboard', [AuthController::class,'index'])->name('dashboard')->middleware('auth');

Route::get('/profile', [ProfileController::class,'index'])->name('profile.index')->middleware('auth');

Route::put('/profile', [ProfileController::class,'update'])->name('profile.update')->middleware('auth');
