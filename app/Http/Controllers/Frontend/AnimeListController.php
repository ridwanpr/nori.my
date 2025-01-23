<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Genre;

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
        $anime = Anime::with('genres')->where('slug', $slug)->firstOrFail();
        return view('frontend.anime_detail', compact('anime'));
    }
}
