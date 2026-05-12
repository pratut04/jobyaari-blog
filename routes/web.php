<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\LikeController;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/

Route::get('/', [BlogController::class, 'index'])->name('home');

Route::get('/post/{slug}', [BlogController::class, 'show'])->name('post.show');

Route::get('/search', [BlogController::class, 'search'])->name('search');

Route::get('/category/{slug}', [BlogController::class, 'category'])->name('category.posts');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::post('/bookmark/{post}', [BookmarkController::class, 'store'])
    ->middleware('auth')
    ->name('bookmark.store');


Route::get('/saved-posts', [BookmarkController::class, 'index'])
    ->middleware('auth')
    ->name('bookmarks.index');

Route::delete('/bookmark/{post}', [BookmarkController::class, 'destroy'])
    ->middleware('auth')
    ->name('bookmark.destroy');

Route::post('/like/{slug}', [LikeController::class, 'toggle'])
    ->middleware('auth')
    ->name('like.toggle');

Route::get('/filter-posts', [BlogController::class, 'filter'])
    ->name('posts.filter');


/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        return view('dashboard', [

            'totalPosts' => \App\Models\Post::count(),

            'publishedPosts' => \App\Models\Post::where('status', 'Published')->count(),

            'draftPosts' => \App\Models\Post::where('status', 'Draft')->count(),

            'trashedPosts' => \App\Models\Post::onlyTrashed()->count(),

        ]);

    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Posts
    |--------------------------------------------------------------------------
    */

    Route::resource('posts', PostController::class);

    Route::get('/posts-trash',
        [PostController::class, 'trash'])
        ->name('posts.trash');

    Route::post('/posts/{id}/restore',
        [PostController::class, 'restore'])
        ->name('posts.restore');

    Route::delete('/posts/{id}/force-delete',
        [PostController::class, 'forceDelete'])
        ->name('posts.forceDelete');

    Route::get('/featured-posts',
        [PostController::class, 'featured'])
        ->name('featured.posts');

    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    */

    Route::resource('categories', CategoryController::class);

    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */

    Route::resource('users', UserController::class);

    Route::patch('/users/{user}/role',
        [UserController::class, 'changeRole'])
        ->name('users.changeRole');

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    */

    Route::resource('settings', SettingController::class);

});

/*
|--------------------------------------------------------------------------
| Normal Auth Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile',
        [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile',
        [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile',
        [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';