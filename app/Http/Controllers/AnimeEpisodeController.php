<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Episode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class AnimeEpisodeController extends Controller
{
    public function index($id): View
    {
        $anime = Anime::findOrFail($id);
        $episodes = Episode::where('anime_id', $id)->get();
        return view('backend.episode.index', compact('episodes', 'anime'));
    }

    public function create($id): View
    {
        $anime = Anime::findOrFail($id);
        return view('backend.episode.create', compact('anime'));
    }

    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ep_number' => 'required|max:20',
            'ep_title' => 'required|string|max:50',
            'content_urls' => 'required|array',
            'content_urls.*' => 'url',
            'quality' => 'required'
        ]);

        $episode = new Episode();
        $episode->anime_id = $id;
        $episode->ep_number = $validatedData['ep_number'];
        $episode->ep_title = $validatedData['ep_title'];
        $episode->ep_slug = Str::slug($validatedData['ep_title']);
        $episode->quality = $request->input('quality');
        $episode->content = json_encode($validatedData['content_urls']);
        $episode->save();

        Anime::where('id', $id)->update(['created_at' => now()]);
        Cache::flush();

        return redirect()->route('episode-list.index', $id)
            ->with('success', 'Episode added successfully');
    }

    public function edit($id): View
    {
        $episode = Episode::findOrFail($id);
        $contentUrls = json_decode($episode->content, true);
        return view('backend.episode.edit', compact('episode', 'contentUrls'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ep_number' => 'required|integer',
            'ep_title' => 'required|string|max:255',
            'content_urls' => 'required|array',
            'content_urls.*' => 'url'
        ]);

        $episode = Episode::findOrFail($id);
        $episode->ep_number = $validatedData['ep_number'];
        $episode->ep_title = $validatedData['ep_title'];
        $episode->ep_slug = \Str::slug($validatedData['ep_title']);
        $episode->content = json_encode($validatedData['content_urls']);
        $episode->quality = $request->input('quality');
        $episode->save();

        Cache::flush();

        return redirect()->route('episode-list.index', $episode->anime_id)
            ->with('success', 'Episode updated successfully');
    }
}
