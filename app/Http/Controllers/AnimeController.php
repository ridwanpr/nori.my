<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AnimeController extends Controller
{
    public function index(): View
    {
        $animes = Anime::with('genres')->latest()->paginate(15);
        return view('backend.anime.index', compact('animes'));
    }

    public function create(): View
    {
        $genres = Genre::all();
        return view('backend.anime.create', compact('genres'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|unique:anime|max:150',
            'slug' => 'required|unique:anime|max:50',
            'image' => 'nullable',
            'status' => 'required',
            'studio' => 'nullable|max:50',
            'year' => 'nullable|max:10',
            'duration' => 'nullable|max:10',
            'synopsis' => 'nullable',
            'genres' => 'required|array',
        ]);

        $anime = Anime::create($request->only([
            'title',
            'slug',
            'image',
            'status',
            'studio',
            'year',
            'duration',
            'synopsis'
        ]));

        if ($request->hasFile('image')) {
            $anime->image = $request->file('image')->store('images', 'public');
            $anime->save();
        }

        $anime->genres()->sync($request->input('genres'));

        return redirect()->route('anime-list.index')->with('success', 'Anime created successfully.');
    }

    public function edit($id): View
    {
        $anime = Anime::findOrFail($id);
        $genres = Genre::all();
        return view('backend.anime.edit', compact('anime', 'genres'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $anime = Anime::findOrFail($id);
        $request->validate([
            'title' => 'required|max:150',
            'slug' => 'required|max:50|unique:anime,slug,' . $anime->id,
            'image' => 'nullable',
            'status' => 'required',
            'studio' => 'nullable|max:50',
            'year' => 'nullable|max:10',
            'duration' => 'nullable|max:10',
            'synopsis' => 'nullable',
            'genres' => 'required|array',
        ]);

        $anime->update($request->only([
            'title',
            'slug',
            'status',
            'studio',
            'year',
            'duration',
            'synopsis'
        ]));

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $anime->image);
            $anime->image = $request->file('image')->store('images', 'public');
            $anime->save();
        }

        $anime->genres()->sync($request->input('genres'));

        return redirect()->route('anime-list.index')->with('success', 'Anime updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $anime = Anime::findOrFail($id);
        Storage::delete('public/' . $anime->image);
        $anime->delete();
        return redirect()->route('anime-list.index')->with('success', 'Anime deleted successfully.');
    }
}
