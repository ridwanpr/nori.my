<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use App\Models\TrendingAnime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(): View
    {
        $latestReleases = Cache::remember('latest_releases', now()->addHour(), function () {
            return Anime::with('genres')->orderBy('updated_at', 'desc')->latest()->take(18)->get();
        });
        $trendingAnime = Cache::remember('trending_anime', now()->addHour(), function () {
            return TrendingAnime::with('anime')->orderBy('weekly_views', 'desc')->take(8)->get();
        });

        return view('welcome', compact('latestReleases', 'trendingAnime'));
    }
}
