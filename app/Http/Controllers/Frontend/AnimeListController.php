<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Anime;
use App\Models\Genre;
use App\Models\Episode;
use Illuminate\Http\Request;
use App\Models\TrendingAnime;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

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

    public function watchEpisode($slug, $episodeSlug): View
    {
        $anime = Anime::with('episode')->where('slug', $slug)->firstOrFail();
        $episode = Episode::where('ep_slug', $episodeSlug)->firstOrFail();

        $episode->content = json_decode($episode->content, true);
        $episodes = $anime->episode;

        return view('frontend.anime_watch', compact('episode', 'anime', 'episodes'));
    }
}
