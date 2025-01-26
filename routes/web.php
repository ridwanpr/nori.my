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
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\Response;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('anime', [AnimeListController::class, 'index'])->name('anime.index');
Route::get('anime/{slug}', [AnimeListController::class, 'show'])->name('anime.show');
Route::get('anime/{slug}/{episodeSlug}/{epNumber}', [AnimeListController::class, 'watchEpisode'])->name('watch-episode');

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


Route::group(['middleware' => ['auth', 'checkRoles:user']], function () {
    Route::post('bookmark/{id}', [BookmarkController::class, 'store'])->name('bookmark.store');
    Route::delete('bookmark/{anime}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    Route::delete('bookmark/delete/{id}', [BookmarkController::class, 'delete'])->name('bookmark.delete');
});

Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create();

    $sitemap->add(Url::create('/')
        ->setPriority(1.0)
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));

    $sitemap->add(Url::create('anime')
        ->setPriority(0.8)
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));

    \App\Models\Anime::chunk(100, function ($animes) use ($sitemap) {
        foreach ($animes as $anime) {
            $sitemap->add(Url::create("anime/{$anime->slug}")
                ->setPriority(0.7)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));

            $episodes = $anime->episode;
            foreach ($episodes as $episode) {
                $sitemap->add(Url::create("anime/{$anime->slug}/{$episode->ep_slug}")
                    ->setPriority(0.6)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
            }
        }
    });

    return Response::make($sitemap->render(), 200, ['Content-Type' => 'application/xml']);
});
