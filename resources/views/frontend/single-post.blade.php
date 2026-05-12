@php
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $post->title }} | JobYaari
    </title>

    <meta
        name="description"
        content="{{ Str::limit(strip_tags($post->content), 150) }}"
    >

    <meta
        name="keywords"
        content="{{ $post->category->name ?? 'Jobs' }}, government jobs, admit card, results"
    >

    <meta
        name="author"
        content="JobYaari"
    >

    <meta property="og:title" content="{{ $post->title }}">

    <meta
        property="og:description"
        content="{{ Str::limit(strip_tags($post->content), 150) }}"
    >

    <meta
        property="og:image"
        content="{{ asset('uploads/posts/' . $post->image) }}"
    >

    <meta
        property="og:url"
        content="{{ url()->current() }}"
    >

    <meta property="og:type" content="article">

    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title" content="{{ $post->title }}">

    <meta
        name="twitter:description"
        content="{{ Str::limit(strip_tags($post->content), 150) }}"
    >

    <meta
        name="twitter:image"
        content="{{ asset('uploads/posts/' . $post->image) }}"
    >

    <script>

    if(localStorage.getItem('theme') === 'dark') {

        document.documentElement.classList.add('dark');

    }

    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gradient-to-br dark:from-[#020617] dark:via-[#071129] dark:to-black dark:text-white transition duration-300 min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-white dark:!bg-[#020617] border-b border-gray-200 dark:border-gray-800 shadow-md sticky top-0 z-50 transition duration-300">
        <div class="max-w-7xl mx-auto px-5 py-4 flex justify-between items-center">

           <!-- LOGO -->
            <div class="flex items-center gap-3">

                <div class="bg-blue-600 text-white w-11 h-11 rounded-xl flex items-center justify-center font-bold text-lg">
                    JY
                </div>

                <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                    JobYaari
                </h1>

            </div>

          <ul class="hidden md:flex gap-6 font-medium">

                <li>
                    <a href="/" class="text-gray-700 dark:text-white hover:text-blue-600 transition">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('category.posts', 'jobs') }}" class="text-gray-700 dark:text-white hover:text-blue-600 transition">
                        Jobs
                    </a>
                </li>

                <li>
                    <a  href="{{ route('category.posts', 'result') }}" class="text-gray-700 dark:text-white hover:text-blue-600 transition">
                        Results
                    </a>
                </li>
                 <li>
                   <a
                        href="{{ route('category.posts', 'admit-card') }}"
                        class="text-gray-700 dark:text-white hover:text-blue-600 transition"
                    >
                        Admit Card
                    </a>
                </li>

                <li>
                    <a href="{{ route('search') }}" class="text-gray-700 dark:text-white hover:text-blue-600 transition">
                        Blogs
                    </a>
                </li>

                @auth

                <li>

                    <a href="{{ route('bookmarks.index') }}"
                    class="text-gray-700 dark:text-white hover:text-blue-600 transition">

                        Saved Posts

                    </a>

                </li>

                @endauth


            </ul>


            <button
                id="menu-btn"
                class="md:hidden text-3xl text-gray-700 dark:text-white"
            >
                ☰
            </button>

            <!-- MOBILE MENU -->

            <div
                id="mobile-menu"
                class="hidden md:hidden mt-5 space-y-4
                bg-white dark:bg-[#111827]
                rounded-2xl p-5 shadow-xl"
            >

                <a href="/" class="block hover:text-blue-600">
                    Home
                </a>

                <a href="{{ route('category.posts', 'jobs') }}"
                class="block hover:text-blue-600">

                    Jobs

                </a>

                <a href="{{ route('category.posts', 'result') }}"
                class="block hover:text-blue-600">

                    Results

                </a>

                <a href="{{ route('category.posts', 'admit-card') }}"
                class="block hover:text-blue-600">

                    Admit Card

                </a>

                <a href="{{ route('search') }}"
                class="block hover:text-blue-600">

                    Blogs

                </a>

            </div>

        </div>
    </nav>

    <!-- PAGE TITLE -->
    <section class="bg-blue-600 text-white py-10">
        <div class="max-w-7xl mx-auto px-5">

            <h1 class="text-4xl font-bold leading-snug">
                {{ $post->title }}
            </h1>

        </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="max-w-7xl mx-auto px-4 sm:px-5 py-8 md:py-10 grid grid-cols-1 lg:grid-cols-12 gap-8">

        <!-- BLOG CONTENT -->
        <div class="lg:col-span-8">

            <div class="bg-white dark:bg-[#111827] rounded-xl shadow-md overflow-hidden transition duration-300">

               <div class="flex justify-center items-center bg-gray-100 dark:bg-[#0f172a] py-6">

                    <img
                        src="{{ asset('uploads/posts/' . $post->image) }}"
                        class="w-full max-w-[350px] h-auto md:h-[250px] object-cover rounded-lg shadow-md"
                        
                    >

                </div>

                <div class="p-8 bg-white dark:bg-[#111827]">

                    <div class="flex items-center gap-5 mb-5 text-gray-500 dark:text-gray-400 text-sm">

                    <span>
                        {{ $post->created_at->format('d M Y') }}
                    </span>

                    <span>
                        👁 {{ number_format($post->views) }} Views
                    </span>

                </div>

                    <h1 class="text-4xl font-bold mb-6 text-gray-900 dark:text-white">

                        {{ $post->title }}
                    </h1>
                    
                    <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                       {!! str_replace('background:white', 'background:transparent', $post->content) !!}
                    </div>


                    <!-- AUTHOR SECTION -->
                   <div class="mt-8 bg-gray-50 dark:bg-[#0f172a]
                        border rounded-2xl p-5
                        flex flex-col sm:flex-row
                        gap-4 items-center sm:items-start
                        max-w-3xl">

                        <!-- AVATAR -->
                        <div class="w-20 h-20 rounded-full overflow-hidden flex-shrink-0">

                            @if($post->user && $post->user->avatar)

                                <img
                                    src="{{ asset('uploads/avatars/' . $post->user->avatar) }}"
                                    class="w-full h-full object-cover"
                                >

                            @else

                                <div class="w-full h-full bg-blue-600 text-white flex items-center justify-center text-3xl font-bold">

                                    {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}

                                </div>

                            @endif

                        </div>

                        <!-- INFO -->
                        <div>

                            <h3 class="text-xl font-bold mb-1">
                                {{ $post->user->name ?? 'Admin' }}
                            </h3>

                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">

                                {{ $post->user->bio ?? 'Passionate writer sharing latest government jobs, results, admit cards and career updates.' }}

                            </p>

                        </div>

                    </div>

                    @auth

                        @php

                        $isBookmarked = auth()->user()
                            ->bookmarks()
                            ->where('post_id', $post->id)
                            ->exists();

                        @endphp

                        <button
                            type="button"
                            id="bookmark-btn"
                            class="mt-6 px-5 py-3 rounded-xl transition duration-300
                            {{ $isBookmarked
                                ? 'bg-blue-600 text-white'
                                : 'bg-white dark:bg-[#0f172a]
                                text-gray-900 dark:text-white
                                border border-gray-300 dark:border-gray-700'
                            }}"
                        >

                            {{ $isBookmarked ? 'Saved' : '🔖 Save Post' }}

                        </button>

                        <script>

                        document.addEventListener('DOMContentLoaded', function () {

                            const bookmarkBtn =
                                document.getElementById('bookmark-btn');

                            bookmarkBtn.addEventListener('click', function () {

                                fetch("{{ route('bookmark.store', $post->id) }}", {

                                    method: "POST",

                                    credentials: "same-origin",

                                    headers: {

                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                        "X-Requested-With": "XMLHttpRequest",
                                        "Accept": "application/json"

                                    }

                                })
                                .then(response => response.json())
                                .then(data => {

                                    if(data.saved) {

                                        bookmarkBtn.innerText = 'Saved';

                                        bookmarkBtn.classList.remove(
                                            'bg-white'
                                        );

                                        bookmarkBtn.classList.add(
                                            'bg-blue-600',
                                            'text-white'
                                        );

                                   } else {

                                        bookmarkBtn.innerText =
                                            '🔖 Save Post';

                                        bookmarkBtn.classList.remove(
                                            'bg-blue-600',
                                            'text-white'
                                        );

                                        bookmarkBtn.classList.add(
                                            'bg-white',
                                            'dark:bg-[#0f172a]',
                                            'text-gray-900',
                                            'dark:text-white',
                                            'border',
                                            'border-gray-300',
                                            'dark:border-gray-700'
                                        );

                                    }

                                });

                            });

                        });

                        </script>

                    @endauth

                    @auth

                    @php

                    $isLiked = auth()->user()
                        ->likes()
                        ->where('post_id', $post->id)
                        ->exists();

                    @endphp

                    <button
                        type="button"
                        id="likeBtn"
                        class="mt-4 px-5 py-3 rounded-xl transition duration-300
                        {{ $isLiked
                            ? 'bg-red-500 text-white'
                            : 'bg-white dark:bg-[#0f172a]
                            text-gray-900 dark:text-white
                            border border-gray-300 dark:border-gray-700'
                        }}"
                    >

                        <span id="like-text">

                            {{ $isLiked ? '❤️ Liked' : '🤍 Like Post' }}

                        </span>

                        (

                        <span id="like-count">

                            {{ $post->likes->count() }}

                        </span>

                        )

                    </button>

                    <script>

                        document.addEventListener('DOMContentLoaded', function () {

                            const likeBtn = document.getElementById('likeBtn');

                            const likeText = document.getElementById('like-text');

                            const likeCount = document.getElementById('like-count');

                            likeBtn.addEventListener('click', function (e) {

                                e.preventDefault();

                                fetch("/like/{{ $post->slug }}", {

                                    method: "POST",

                                    credentials: "same-origin",

                                    headers: {

                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                        "X-Requested-With": "XMLHttpRequest",
                                        "Accept": "application/json"

                                    }

                                })
                                .then(response => response.json())
                                .then(data => {

                                    likeCount.innerText = data.count;

                                    if(data.liked) {

                                        likeText.innerText = '❤️ Liked';

                                        likeBtn.classList.remove(
                                            'bg-white',
                                            'dark:bg-[#0f172a]',
                                            'text-gray-900',
                                            'border',
                                            'border-gray-300',
                                            'dark:border-gray-700'
                                        );

                                        likeBtn.classList.add(
                                            'bg-red-500',
                                            'text-white'
                                        );

                                    } else {

                                        likeText.innerText = '🤍 Like Post';

                                        likeBtn.classList.remove(
                                            'bg-red-500',
                                            'text-white'
                                        );

                                        likeBtn.classList.add(
                                            'bg-white',
                                            'dark:bg-[#0f172a]',
                                            'text-gray-900',
                                            'dark:text-white',
                                            'border',
                                            'border-gray-300',
                                            'dark:border-gray-700'
                                        );

                                    }

                                });

                            });

                        });

                    </script>

                    @endauth

                   
                    <!-- SHARE BUTTONS -->
                    <div class="mt-10 border-t pt-6">

                        <h3 class="text-2xl font-bold mb-5">
                            Share This Post
                        </h3>

                        <div class="flex gap-4 overflow-x-auto pb-2">

                            <!-- WHATSAPP -->
                            <a href="https://wa.me/?text={{ urlencode(url()->current()) }}"
                            target="_blank"
                            class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg transition whitespace-nowrap">

                                WhatsApp

                            </a>

                            <!-- FACEBOOK -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                            target="_blank"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition whitespace-nowrap">

                                Facebook

                            </a>

                            <!-- TWITTER -->
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}"
                            target="_blank"
                            class="bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-lg transition whitespace-nowrap">

                                Twitter / X

                            </a>

                            <!-- LINKEDIN -->
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                            target="_blank"
                            class="bg-blue-800 hover:bg-blue-900 text-white px-6 py-3 rounded-lg transition whitespace-nowrap">

                                LinkedIn

                            </a>

                        </div>

                    </div>

                    <!-- COMMENTS -->
                    <div class="mt-14 border-t pt-10">

                        <h2 class="text-3xl font-bold mb-8">
                            Comments (
                                <span id="comment-count">

                                    {{ $post->comments->count() }}

                                </span>
                                )
                        </h2>

                        <div id="comments-container" class="space-y-6 mb-12">

                            @forelse($post->comments as $comment)

                                <div class="bg-gray-50 dark:bg-[#0f172a] rounded-2xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">

                                    <div class="flex items-center justify-between mb-3">

                                        <h4 class="font-bold text-lg text-gray-900 dark:text-white">
                                            {{ $comment->name }}
                                        </h4>

                                        <span class="text-sm text-gray-500">
                                           {{ $comment->created_at->format('d M Y') }}
                                        </span>

                                    </div>

                                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                        {{ $comment->comment }}
                                    </p>

                                </div>

                            @empty

                                <div
                                    id="empty-comments"
                                    class="bg-white dark:bg-[#111827] rounded-2xl p-6 text-center shadow-sm border border-gray-200 dark:border-gray-700 max-w-2xl mx-auto"
                                >

                                    <h3 class="text-xl font-semibold text-gray-600 dark:text-gray-300">
                                        No comments yet
                                    </h3>

                                    <p class="text-gray-500 dark:text-gray-400 mt-2">
                                        Be the first to comment.
                                    </p>

                                </div>

                            @endforelse

                        </div>

                    </div>

                    <!-- COMMENT FORM -->
                    <div class="bg-white dark:bg-[#111827] rounded-2xl shadow-md p-8 border border-gray-200 dark:border-gray-700 max-w-3xl mx-auto">

                        <h2 class="text-3xl font-bold mb-8">
                            Leave a Comment
                        </h2>

                        @if(session('success'))

                            <div class="bg-green-100 text-green-700 px-4 py-2 rounded-lg mb-6">
                                {{ session('success') }}
                            </div>

                        @endif

                        <form
                            id="comment-form"
                            action="{{ route('comments.store') }}"
                            method="POST"
                            class="space-y-6"
                        >

                            @csrf

                            <input type="hidden" name="post_id" value="{{ $post->id }}">

                           @guest

                                <div>
                                    <label class="block font-semibold mb-2">Name</label>

                                    <input
                                        type="text"
                                        name="name"
                                        class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-[#0f172a] text-gray-900 dark:text-white rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required
                                    >
                                </div>

                                <div>
                                    <label class="block font-semibold mb-2">Email</label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-[#0f172a] text-gray-900 dark:text-white rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required
                                    >
                                </div>

                                @endguest

                            <div>
                                <label class="block font-semibold mb-2">Comment</label>

                                <textarea
                                    id="comment-input"
                                    name="comment"
                                    rows="4"
                                    class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-[#0f172a] text-gray-900 dark:text-white rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required
                                ></textarea>
                            </div>

                            <button
                                type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl transition"
                            >
                                Post Comment
                            </button>

                        </form>

                    </div>

                </div>

            </div>

           
           

        </div>

        <!-- SIDEBAR -->
        <div class="lg:col-span-4">

            <!-- CATEGORIES -->
            <div class="bg-white dark:bg-[#111827] rounded-xl shadow-md border border-gray-200 dark:border-gray-700 p-6 mb-8">

                <h3 class="text-2xl font-bold mb-5">
                    Categories
                </h3>

               <div class="flex flex-wrap gap-3">

                    @foreach($categories as $category)

                        <a
                            href="{{ route('category.posts', $category->slug) }}"
                            class="inline-block bg-blue-100
                            text-blue-700 hover:bg-blue-600
                            hover:text-white px-5 py-2
                            rounded-lg font-semibold text-sm
                            transition duration-300"
                        >

                            {{ $category->name }}

                        </a>

                    @endforeach

                </div>

            </div>

            <!-- RECENT POSTS -->
            <div class="bg-white dark:bg-[#111827] rounded-xl shadow-md border border-gray-200 dark:border-gray-700 p-6">

                <h3 class="text-2xl font-bold mb-5">
                    Recent Posts
                </h3>

                <div class="space-y-5">

                    @foreach($recentPosts as $recent)

                        <a href="{{ route('post.show', $recent->slug) }}"
                           class="flex gap-3 border-b pb-4 hover:text-blue-600">

                            <img
                                src="{{ asset('uploads/posts/' . $recent->image) }}"
                                class="w-24 h-20 object-cover rounded-lg"
                            >

                            <div>

                                <h4 class="font-semibold text-gray-900 dark:text-white">
                                    {{ Str::limit($recent->title, 50) }}
                                </h4>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $recent->created_at->format('d M Y') }}
                                </p>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>

            <!-- RELATED POSTS -->

            <div class="bg-white dark:bg-[#111827]
            rounded-xl shadow-md p-6 mt-8">

                <h2 class="text-2xl font-bold mb-6
                text-gray-900 dark:text-white">

                    Related Posts

                </h2>

                <div class="space-y-4">

                    @forelse($relatedPosts as $related)

                        <a
                            href="{{ route('post.show', $related->slug) }}"
                            class="flex gap-4
                            bg-gray-50 dark:bg-[#0f172a]
                            rounded-2xl p-3
                            border border-gray-200
                            dark:border-gray-700
                            hover:shadow-lg transition duration-300"
                        >

                            <!-- IMAGE -->

                            <img
                                src="{{ asset('uploads/posts/' . $related->image) }}"
                                class="w-24 h-24 object-cover rounded-xl"
                            >

                            <!-- CONTENT -->

                            <div class="flex-1">

                                <p class="text-xs text-gray-500 mb-2">

                                    {{ $related->created_at->format('d M Y') }}

                                </p>

                                <h3 class="font-bold text-sm
                                text-gray-900 dark:text-white
                                hover:text-blue-600 transition
                                line-clamp-2">

                                    {{ Str::limit($related->title, 40) }}

                                </h3>

                                <p class="text-xs text-gray-500
                                dark:text-gray-400 mt-2
                                line-clamp-2">

                                    {{ Str::limit(strip_tags($related->content), 55) }}

                                </p>

                            </div>

                        </a>

                    @empty

                        <p class="text-gray-500 dark:text-gray-400">

                            No related posts found.

                        </p>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

    
<script>

document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('comment-form');

    form.addEventListener('submit', function(e) {

        e.preventDefault();

        const formData = new FormData(form);

        fetch(form.action, {

            method: "POST",

            headers: {

                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Accept": "application/json"

            },

            body: formData

        })
        .then(response => response.json())
        .then(data => {

            if(data.success) {

                const emptyComments =
                    document.getElementById('empty-comments');

                if(emptyComments) {

                    emptyComments.remove();

                }

                const commentsContainer =
                    document.getElementById('comments-container');

                const newComment = `

                    <div class="bg-gray-50 dark:bg-[#0f172a]
                    rounded-2xl p-6 shadow-sm border
                    border-gray-200 dark:border-gray-700">

                        <div class="flex items-center justify-between mb-3">

                            <h4 class="font-bold text-lg text-gray-900 dark:text-white">

                                ${data.comment.name}

                            </h4>

                            <span class="text-sm text-gray-500">

                                ${data.comment.date}

                            </span>

                        </div>

                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">

                            ${data.comment.comment}

                        </p>

                    </div>
                `;

                commentsContainer.insertAdjacentHTML(
                    'afterbegin',
                    newComment
                );

                form.reset();

                const commentCount =
                    document.getElementById('comment-count');

                commentCount.innerText =
                    parseInt(commentCount.innerText) + 1;

            }

        })
        .catch(error => console.log(error));

    });

});

</script>


<script>

const menuBtn = document.getElementById('menu-btn');

const mobileMenu = document.getElementById('mobile-menu');

menuBtn.addEventListener('click', () => {

    mobileMenu.classList.toggle('hidden');
 
});

</script>

<!-- FOOTER -->

<footer class="bg-[#020617] text-white mt-16 border-t border-gray-800">

    <div class="max-w-7xl mx-auto px-5 py-12">

        <div class="grid md:grid-cols-3 gap-10">

            <!-- BRAND -->

            <div>

                <div class="flex items-center gap-3 mb-5">

                    <div class="bg-blue-600 text-white w-12 h-12 rounded-xl flex items-center justify-center font-bold text-lg">

                        JY

                    </div>

                    <h2 class="text-3xl font-extrabold">
                        JobYaari
                    </h2>

                </div>

                <p class="text-gray-400 leading-relaxed">

                    JobYaari provides latest government jobs,
                    admit cards, results, recruitment updates,
                    answer keys and career news for students
                    across India.

                </p>

            </div>

            <!-- QUICK LINKS -->

            <div>

                <h3 class="text-2xl font-bold mb-5">
                    Quick Links
                </h3>

                <div class="space-y-3">

                    <a
                        href="/"
                        class="block text-gray-400 hover:text-white transition"
                    >

                        Home

                    </a>

                    <a
                        href="{{ route('category.posts', 'jobs') }}"
                        class="block text-gray-400 hover:text-white transition"
                    >

                        Jobs

                    </a>

                    <a
                        href="{{ route('category.posts', 'result') }}"
                        class="block text-gray-400 hover:text-white transition"
                    >

                        Results

                    </a>

                    <a
                        href="{{ route('category.posts', 'admit-card') }}"
                        class="block text-gray-400 hover:text-white transition"
                    >

                        Admit Card

                    </a>

                    <a
                        href="{{ route('search') }}"
                        class="block text-gray-400 hover:text-white transition"
                    >

                        Blogs

                    </a>

                </div>

            </div>

            <!-- CONTACT -->

            <div>

                <h3 class="text-2xl font-bold mb-5">
                    Contact
                </h3>

                <div class="space-y-3 text-gray-400">

                    <p>

                        📧 support@jobyaari.com

                    </p>

                    <p>

                        🌍 India

                    </p>

                    <p>

                        📢 Daily Government Job Updates

                    </p>

                </div>

            </div>

        </div>

        <!-- BOTTOM -->

        <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-500 text-sm">

            © 2026 JobYaari. All rights reserved.

        </div>

    </div>

</footer>
</body>
</html>