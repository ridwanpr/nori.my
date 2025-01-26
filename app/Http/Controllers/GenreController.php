<?php

namespace App\Http\Controllers;

use Str;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class GenreController extends Controller
{
    public function index(): View
    {
        $genres = Genre::orderBy('name')->paginate(10);
        return view('backend.genre.index', compact('genres'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:genres|max:255',
        ]);

        $slug = Str::slug($request->input('name'));

        Genre::create([
            'name' => $request->input('name'),
            'slug' => $slug,
        ]);
        
        Cache::flush();

        return redirect()->route('genre.index')->with('success', 'Genre created successfully.');
    }

    public function edit(Genre $genre): View
    {
        return view('backend.genre.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:genres,name,' . $genre->id . '|max:255',
        ]);

        $slug = Str::slug($request->input('name'));

        $genre->update([
            'name' => $request->input('name'),
            'slug' => $slug,
        ]);

        Cache::flush();

        return redirect()->route('genre.index')->with('success', 'Genre updated successfully.');
    }

    public function destroy(Genre $genre): RedirectResponse
    {
        $genre->delete();
        Cache::flush();

        return redirect()->route('genre.index')->with('success', 'Genre deleted successfully.');
    }
}
