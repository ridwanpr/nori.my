<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anime;
use App\Models\Episode;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalUser = User::count();
        $totalGenre = Genre::count();
        $totalAnime = Anime::count();
        $totalEpisode = Episode::count();

        return view('backend.dashboard.index', compact('totalUser', 'totalGenre', 'totalAnime', 'totalEpisode'));
    }
}
