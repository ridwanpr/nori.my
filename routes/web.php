<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\AnimeListController;
use App\Http\Controllers\Frontend\BookmarkController;
use App\Http\Controllers\Frontend\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('anime', [AnimeListController::class, 'index'])->name('anime.index');
Route::get('anime/{slug}', [AnimeListController::class, 'show'])->name('anime.show');
Route::view('anime-watch', 'frontend.anime_watch');

Route::get('login', [AuthController::class, 'getLoginPage'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('register', [AuthController::class, 'getRegisterPage'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('register.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkRoles:admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('genre', GenreController::class);
    Route::resource('anime-list', AnimeController::class);
});

Route::group(['middleware' => ['auth', 'checkRoles:user']], function () {
    Route::get('bookmark', [BookmarkController::class, 'index'])->name('bookmark.index');
});


