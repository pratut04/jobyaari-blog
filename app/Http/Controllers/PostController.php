<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        $search = $request->search;

        $posts = Post::with('category')
                    ->when($search, function ($query) use ($search) {

                        $query->where('title', 'LIKE', "%{$search}%");

                    })
                    ->latest()
                    ->get();
                    // ->paginate(5);

        return view('posts.index', compact('posts', 'search'));
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()
                    ->latest()
                    ->get();

        return view('posts.trash', compact('posts'));
    }

    public function restore($id)
    {
        Post::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('posts.trash')
                        ->with('success', 'Post restored successfully');
    }

    public function forceDelete($id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        // delete image permanently
        if ($post->image &&
            File::exists(public_path('uploads/posts/' . $post->image))) {

            File::delete(public_path('uploads/posts/' . $post->image));
        }

        $post->forceDelete();

        return redirect()->route('posts.trash')
                        ->with('success', 'Post permanently deleted');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:Published,Draft',
            'is_featured' => 'boolean',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time() . '.' .
                        $request->image->extension();

            $request->image->move(
                public_path('uploads/posts'),
                $imageName
            );
        }

       Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $imageName,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('posts.index')
                        ->with('success', 'Post created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $relatedPosts = Post::where('category_id', $post->category_id)
                            ->where('id', '!=', $post->id)
                            ->latest()
                            ->take(3)
                            ->get();

        $latestPosts = Post::latest()
                            ->take(5)
                            ->get();

        return view('posts.show', compact(
            'post',
            'relatedPosts',
            'latestPosts'
        ));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:Published,Draft',
            'is_featured' => 'boolean',
        ]);

        $imageName = $post->image;

        if ($request->hasFile('image')) {

            // delete old image
            if ($post->image &&
                File::exists(public_path('uploads/posts/' . $post->image))) {

                File::delete(public_path('uploads/posts/' . $post->image));
            }

            // upload new image
            $imageName = time() . '.' .
                        $request->image->extension();

            $request->image->move(
                public_path('uploads/posts'),
                $imageName
            );
        }

        $post->update([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title), 
            'status' => $request->status,
            'is_featured' => $request->has('is_featured'),
        ]);
        return redirect()->route('posts.index')
                        ->with('success', 'Post updated successfully');
    }


    public function featured()
    {
        $posts = Post::where('is_featured', 1)
                    ->latest()
                    ->get();

        return view('posts.featured', compact('posts'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // soft delete only
        $post->delete();

        return redirect()->route('posts.index')
                        ->with('success', 'Post moved to trash');
    }
}
