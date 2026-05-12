<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


class BlogController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HOME PAGE
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $latestPosts = Post::where('status', 'published')
            ->latest()
            ->paginate(5);

        $featuredPosts = Post::where('status', 'published')
            ->where('is_featured', 1)
            ->latest()
            ->take(4)
            ->get();

        $categories = Category::latest()->get();

        $popularPosts = Post::where('status', 'published')
        ->orderBy('views', 'DESC')
        ->take(3)
        ->get();

        return view('frontend.home', compact(
            'latestPosts',
            'featuredPosts',
            'categories',
            'popularPosts'

        ));
    }

    /*
    |--------------------------------------------------------------------------
    | SINGLE BLOG PAGE
    |--------------------------------------------------------------------------
    */
    public function show($slug)
    {
       $post = Post::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $post->increment('views');

        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->latest()
            ->take(5)
            ->get();

        $recentPosts = Post::where('status', 'published')
            ->latest()
            ->take(5)
            ->get();

        $categories = Category::latest()->get();

        return view('frontend.single-post', compact(
            'post',
            'relatedPosts',
            'recentPosts',
            'categories'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | SEARCH POSTS
    |--------------------------------------------------------------------------
    */
    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->where('status', 'published')
            ->latest()
            ->paginate(5);

        return view('frontend.search', compact(
            'posts',
            'query'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | CATEGORY POSTS
    |--------------------------------------------------------------------------
    */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)
            ->firstOrFail();

        $posts = Post::where('category_id', $category->id)
            ->where('status', 'published')
            ->latest()
            ->paginate(5);

        $categories = Category::latest()->get();

        return view('frontend.category-posts', compact(
            'category',
            'posts',
            'categories'
        ));
    }

    public function filter(Request $request)
    {
        $posts = \App\Models\Post::query();

        // CATEGORY FILTER

        if($request->category) {

            $posts->whereHas('category', function($query) use ($request) {

                $query->where('slug', $request->category);

            });

        }

        // DATE FILTER

        if($request->date) {

            $posts->whereDate('created_at', $request->date);

        }

        $posts = $posts->latest()->get();

        $html = view(
            'frontend.partials.filtered-posts',
            compact('posts')
        )->render();

        return response()->json([

            'html' => $html

        ]);
    }

}