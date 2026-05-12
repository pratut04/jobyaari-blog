<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
   public function store(Request $request)
    {
        $rules = [

            'post_id' => 'required',
            'comment' => 'required',

        ];

        // GUEST VALIDATION

        if(!auth()->check()) {

            $rules['name'] = 'required|max:255';

            $rules['email'] = 'required|email';

        }

        $request->validate($rules);

        $comment = Comment::create([

            'post_id' => $request->post_id,

            'user_id' => auth()->check()
                ? auth()->id()
                : null,

            'name' => auth()->check()
                ? auth()->user()->name
                : $request->name,

            'email' => auth()->check()
                ? auth()->user()->email
                : $request->email,

            'comment' => $request->comment,

        ]);

        return response()->json([

            'success' => true,

            'comment' => [

                'name' => $comment->name,

                'comment' => $comment->comment,

                'date' => $comment->created_at->format('d M Y'),

            ]

        ]);
    }
}