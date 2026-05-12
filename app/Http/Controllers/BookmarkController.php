<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    public function store($postId)
    {
        $bookmark = Bookmark::where('user_id', auth()->id())
            ->where('post_id', $postId)
            ->first();

        if($bookmark) {

            $bookmark->delete();

            return response()->json([

                'saved' => false

            ]);
        }

        Bookmark::create([

            'user_id' => auth()->id(),
            'post_id' => $postId,

        ]);

        return response()->json([

            'saved' => true

        ]);
    }


    public function index()
    {
        $bookmarks = auth()->user()
            ->bookmarks()
            ->with('post')
            ->latest()
            ->get();

        return view('frontend.bookmarks', compact('bookmarks'));
    }

    public function destroy($postId)
    {
        Bookmark::where('user_id', auth()->id())
            ->where('post_id', $postId)
            ->delete();

        return back()->with('success', 'Bookmark removed!');
    }
}