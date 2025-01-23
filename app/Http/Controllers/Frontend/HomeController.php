<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $latestReleases = Anime::with('genres')->latest()->take(10)->get();

        return view('welcome', compact('latestReleases'));
    }
}
