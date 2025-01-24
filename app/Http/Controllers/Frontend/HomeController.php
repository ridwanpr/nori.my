<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use App\Models\TrendingAnime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $latestReleases = Anime::with('genres')->latest()->take(18)->get();
        $trendingAnime = TrendingAnime::with('anime')->orderBy('weekly_views', 'desc')->take(8)->get();

        return view('welcome', compact('latestReleases', 'trendingAnime'));
    }
}
