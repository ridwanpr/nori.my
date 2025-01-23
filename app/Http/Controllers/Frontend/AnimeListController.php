<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\TrendingAnime;

class AnimeListController extends Controller
{
    public function index(): View
    {
        $animes = Anime::with('genres')->paginate(10);
        $genres = Genre::orderBy('name')->get();
        return view('frontend.anime_list', compact('animes', 'genres'));
    }

    public function show($slug): View
    {
        $anime = Anime::with('genres', 'episode')->where('slug', $slug)->firstOrFail();
        $trendingAnime = TrendingAnime::where('anime_id', $anime->id)->firstOrCreate(
            ['anime_id' => $anime->id],
            ['weekly_views' => 0]
        );

        $trendingAnime->increment('weekly_views');

        return view('frontend.anime_detail', compact('anime'));
    }
}
