<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Anime;
use App\Models\Genre;
use App\Models\Episode;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use App\Models\TrendingAnime;
use App\Jobs\IncrementViewCount;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class AnimeListController extends Controller
{
    public function index(Request $request): View
    {
        $cacheKey = 'anime_list_' . $request->fullUrl();
        $animes = Cache::remember($cacheKey, now()->addHour(), function () use ($request) {
            $query = Anime::with('genres');

            if ($request->has('search') && $request->input('search')) {
                $query->where('title', 'like', '%' . $request->input('search') . '%');
            }

            if ($request->has('genres') && is_array($request->input('genres'))) {
                $query->whereHas('genres', function ($q) use ($request) {
                    $q->whereIn('genres.id', $request->input('genres'));
                });
            }

            if ($request->filled('year')) {
                $query->where('year', $request->input('year'));
            }

            if ($request->filled('status')) {
                $query->where('status', $request->input('status'));
            }

            if ($request->filled('sort_by')) {
                switch ($request->input('sort_by')) {
                    case 'popularity':
                        $query->leftJoin('trending_anime', 'anime.id', '=', 'trending_anime.anime_id')
                            ->orderBy('trending_anime.weekly_views', 'desc');
                        break;
                    case 'latest':
                        $query->orderBy('created_at', 'desc');
                        break;
                }
            } else {
                $query->orderBy('created_at', 'desc');
            }

            return $query->paginate(12);
        });

        $genres = Cache::remember('genres', now()->addHour(), function () {
            return Genre::orderBy('name')->get();
        });

        return view('frontend.anime_list', compact('animes', 'genres'));
    }

    public function show($slug): View
    {
        $anime = Cache::remember('anime_' . $slug, now()->addHour(), function () use ($slug) {
            return Anime::with(['genres', 'episode' => function ($query) {
                $query->select('anime_id', 'ep_number', 'ep_title', 'ep_slug')
                    ->distinct();
            }])
                ->where('slug', $slug)
                ->firstOrFail();
        });

        $cacheKey = 'anime_' . $anime->id . '_view_count';
        Cache::increment($cacheKey);

        IncrementViewCount::dispatch($anime->id)->delay(now()->addSeconds(5));

        $isBookmarked = Cache::remember('bookmark_' . auth()->id() . '_anime_' . $anime->id, now()->addHour(), function () use ($anime) {
            return Bookmark::where('user_id', auth()->id())
                ->where('anime_id', $anime->id)
                ->exists();
        });

        return view('frontend.anime_detail', compact('anime', 'isBookmarked'));
    }

    public function watchEpisode($slug, $episodeSlug, $epNumber)
    {
        $anime = Anime::with(['episode' => function ($query) use ($epNumber) {
            $query->where('ep_number', $epNumber);
        }])->where('slug', $slug)->firstOrFail();

        $episode = Episode::where('anime_id', $anime->id)
            ->where('ep_number', $epNumber)
            ->where('ep_slug', $episodeSlug)
            ->firstOrFail();

        $groupedEpisodes = $anime->episode->groupBy('quality');

        $allEps = Episode::where('anime_id', $anime->id)
            ->select('id', 'ep_number', 'ep_slug')
            ->orderByRaw('CAST(ep_number AS UNSIGNED)')
            ->get()
            ->unique('ep_number')
            ->values();

        return view('frontend.anime_watch', compact('episode', 'anime', 'groupedEpisodes', 'allEps'));
    }
}
