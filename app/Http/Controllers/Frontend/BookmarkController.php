<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use Illuminate\Http\RedirectResponse;

class BookmarkController extends Controller
{
    public function index(): View
    {
        $bookmarks = Bookmark::with('anime')->where('user_id', auth()->id())->paginate(15);
        return view('frontend.bookmark.index', compact('bookmarks'));
    }

    public function store(Request $request, $id)
    {
        $existingBookmark = Bookmark::where('user_id', auth()->id())
            ->where('anime_id', $id)
            ->first();

        if ($existingBookmark) {
            return response()->json([
                'status' => 'exists',
                'message' => 'Bookmark already exists.'
            ]);
        }

        Bookmark::create([
            'user_id' => auth()->id(),
            'anime_id' => $id
        ]);

        return response()->json(['success' => true, 'message' => 'Bookmark added successfully.']);
    }

    public function destroy($id)
    {
        $deleted = Bookmark::where('user_id', auth()->id())
            ->where('anime_id', $id)
            ->delete();

        return response()->json(['success' => true, 'message' => 'Bookmark removed successfully.']);
    }

    public function delete($id)
    {
        Bookmark::where('user_id', auth()->id())
            ->where('id', $id)
            ->delete();

        return back()->with('success', 'Bookmark removed successfully.');
    }
}
