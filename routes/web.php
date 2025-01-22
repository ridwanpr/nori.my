<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\BookmarkController;
use App\Http\Controllers\Frontend\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('anime-list', 'frontend.anime_list');
Route::view('anime-detail', 'frontend.anime_detail');
Route::view('anime-watch', 'frontend.anime_watch');

Route::get('login', [AuthController::class, 'getLoginPage'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('register', [AuthController::class, 'getRegisterPage'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('register.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('bookmark', [BookmarkController::class, 'index'])->name('bookmark.index');