<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    public function toggle($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $existingLike = Like::where('user_id', auth()->id())
            ->where('post_id', $post->id)
            ->first();

        if($existingLike) {

            $existingLike->delete();

            return response()->json([

                'liked' => false,

                'count' => $post->likes()->count()

            ]);
        }

        Like::create([

            'user_id' => auth()->id(),
            'post_id' => $post->id,

        ]);

        return response()->json([

            'liked' => true,

            'count' => $post->likes()->count()

        ]);
    }
}