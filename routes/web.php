<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::get('/register',[AuthController::class,'register'])->name('auth.register');
Route::post('/login', [AuthController::class,'doLogin']);
