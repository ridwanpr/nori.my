<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('anime-list', 'frontend.anime_list');
Route::view('anime-detail', 'frontend.anime_detail');
Route::view('anime-watch', 'frontend.anime_watch');

Route::get('login', [AuthController::class, 'getLoginPage'])->name('login');
Route::get('register', [AuthController::class, 'getRegisterPage'])->name('register');