<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\AnimeEpisodeController;
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
Route::get('anime/{slug}/{episodeSlug}', [AnimeListController::class, 'watchEpisode'])->name('watch-episode');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'getLoginPage'])->name('login');
    Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');
    Route::get('register', [AuthController::class, 'getRegisterPage'])->name('register');
    Route::post('register', [AuthController::class, 'postRegister'])->name('register.post');
});
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkRoles:admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('episode-list/{id}', [AnimeEpisodeController::class, 'index'])->name('episode-list.index');
    Route::get('episode-list/create/{id}', [AnimeEpisodeController::class, 'create'])->name('episode-list.create');
    Route::post('episode-list/store/{id}', [AnimeEpisodeController::class, 'store'])->name('episode-list.store');
    Route::get('episode-list/edit/{id}', [AnimeEpisodeController::class, 'edit'])->name('episode-list.edit');
    Route::put('episode-list/update/{id}', [AnimeEpisodeController::class, 'update'])->name('episode-list.update');

    Route::resource('genre', GenreController::class);
    Route::resource('anime-list', AnimeController::class);
});

Route::get('bookmark', [BookmarkController::class, 'index'])->name('bookmark.index');


Route::group(['middleware' => ['auth', 'checkRoles:user']], function () {});
