@php
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobYaari</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gradient-to-br dark:from-[#020617] dark:via-[#071129] dark:to-black dark:text-white transition duration-300 min-h-screen">

    <!-- NAVBAR -->
<nav class="bg-white dark:!bg-[#020617] border-b border-gray-200 dark:border-gray-800 shadow-md sticky top-0 z-50 transition duration-300">
    <div class="max-w-7xl mx-auto px-5 py-4">

        <div class="flex justify-between items-center">

            <!-- LOGO -->
            <div class="flex items-center gap-3">

                <div class="bg-blue-600 text-white w-11 h-11 rounded-xl flex items-center justify-center font-bold text-lg">
                    JY
                </div>

                <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                    JobYaari
                </h1>

            </div>

            <!-- DESKTOP MENU -->
            <ul class="hidden md:flex gap-8 font-medium text-gray-700 dark:text-white items-center">

                <li>
                    <a href="/" class="hover:text-blue-600 transition">
                        Home
                    </a>
                </li>

                <li>
                   <a
                        href="{{ route('category.posts', 'jobs') }}"
                        class="hover:text-blue-600 transition"
                    >
                        Jobs
                    </a>
                </li>

                <li>
                    <a
                        href="{{ route('category.posts', 'result') }}"
                        class="hover:text-blue-600 transition"
                    >
                        Results
                    </a>
                </li>

                <li>
                   <a
                        href="{{ route('category.posts', 'admit-card') }}"
                        class="hover:text-blue-600 transition"
                    >
                        Admit Card
                    </a>
                </li>

                <li>
                    <a href="{{ route('search') }}" class="hover:text-blue-600 transition">
                        Blogs
                    </a>
                </li>

                @auth

                <li>

                    <a href="{{ route('bookmarks.index') }}"
                    class="hover:text-blue-600 transition">

                        Saved Posts

                    </a>

                </li>


                @endauth


                @auth

                <li>

                    <a
                        href="{{ route('profile.edit') }}"
                        class="text-gray-700 dark:text-white hover:text-blue-600 transition"
                    >

                        My Profile

                    </a>

                </li>

                @endauth

                <li>

                    <button
                        id="darkToggle"
                        class="bg-gray-200 dark:bg-gray-700 dark:text-white px-4 py-2 rounded-lg text-sm transition"
                    >
                        🌙
                    </button>

                </li>

                @auth

                    @if(auth()->user()->role == 'admin')

                        <li>
                            <a href="{{ route('dashboard') }}"
                               class="hover:text-blue-600 transition">
                                Dashboard
                            </a>
                        </li>

                    @endif

                    <li>

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button
                                type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">

                                Logout

                            </button>

                        </form>

                    </li>

                @else

                    <li>
                        <a href="{{ route('login') }}"
                           class="hover:text-blue-600 transition">
                            Login
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('register') }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                            Register
                        </a>
                    </li>

                @endauth

            </ul>

            <!-- MOBILE BUTTON -->
            <button id="menu-btn"
                class="md:hidden text-3xl text-gray-700 dark:text-white">

                ☰

            </button>

        </div>

        <!-- MOBILE MENU -->
     <div id="mobile-menu"
        class="hidden md:hidden mt-5 space-y-4 pb-4
        bg-white dark:!bg-[#020617]
        text-gray-700 dark:text-white
        border border-gray-200 dark:border-gray-700
        rounded-2xl p-4 shadow-xl transition duration-300">

            <a href="/" class="block hover:text-blue-600 transition">
                Home
            </a>

            <a href="{{ route('category.posts', 'jobs') }}" class="block hover:text-blue-600 transition">
                Jobs
            </a>

            <a href="{{ route('category.posts', 'result') }}" class="block hover:text-blue-600 transition">
                Result
            </a>

            <a  href="{{ route('category.posts', 'admit-card') }}" class="block hover:text-blue-600 transition">
                Admit Card
            </a>

            <a href="{{ route('search') }}" class="block hover:text-blue-600 transition">
                Blogs
            </a>

            @auth

            <a href="{{ route('bookmarks.index') }}"
            class="block hover:text-blue-600 transition">

                Saved Posts

            </a>

            @endauth            

            <!-- MOBILE DARK MODE BUTTON -->
        <button
            id="mobileDarkToggle"
            class="w-full flex items-center justify-between
            bg-gray-100 dark:bg-gray-800
            px-4 py-3 rounded-xl
            text-gray-700 dark:text-white
            transition duration-300"
        >

            <span class="font-medium">
                🌙 Dark Mode
            </span>

            <!-- SWITCH -->
            <div
                id="mobileSwitch"
                class="w-12 h-6 rounded-full relative transition duration-300
                bg-gray-400 dark:bg-blue-600"
            >

                <div
                    id="mobileSwitchDot"
                    class="w-5 h-5 bg-white rounded-full absolute top-0.5 left-0.5
                    transition-all duration-300 dark:translate-x-6"
                ></div>

            </div>

        </button>

            @auth

                @if(auth()->user()->role == 'admin')

                    <a href="{{ route('dashboard') }}"
                       class="block hover:text-blue-600 transition">

                        Dashboard

                    </a>

                @endif

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">

                        Logout

                    </button>

                </form>

            @else

                <a href="{{ route('login') }}"
                   class="block hover:text-blue-600 transition">

                    Login

                </a>

                <a href="{{ route('register') }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">

                    Register

                </a>

            @endauth

        </div>

    </div>

</nav>

   <!-- HERO SECTION -->
<section class="bg-gradient-to-r from-blue-950 via-blue-900 to-blue-950 py-14">

    <div class="max-w-5xl mx-auto px-5 text-center">

        <h2 class="text-4xl font-extrabold text-white mb-4">
            Latest Government Jobs & Updates
        </h2>

        <p class="text-lg text-white mb-8">
            Find latest jobs, results, admit cards, answer keys and recruitment updates in one place.
        </p>

        <!-- SEARCH -->
        <form action="{{ route('search') }}" method="GET"
              class="max-w-3xl mx-auto">

            <input
                type="text"
                name="query"
                placeholder="Search jobs, results, blogs..."
                class="w-full px-5 py-4 rounded-xl shadow-lg text-lg outline-none bg-white dark:bg-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
            >

        </form>

    </div>

</section>
    <!-- MAIN CONTENT -->
    <div class="max-w-7xl mx-auto px-5 py-12 grid lg:grid-cols-12 gap-8">

        <!-- BLOG SECTION -->
        <div class="lg:col-span-8">

            <h2 class="text-4xl font-bold mb-8 text-gray-900 dark:text-white">
                Latest Posts
            </h2>


            <!-- FILTERS -->

            <div class="flex flex-wrap gap-4 mb-8">

                <!-- CATEGORY -->

                <select
                    id="category-filter"
                    class="px-4 py-3 rounded-xl border
                    dark:bg-[#111827]
                    dark:text-white
                    dark:border-gray-700"
                >

                    <option value="">
                        All Categories
                    </option>

                    @foreach($categories as $category)

                        <option value="{{ $category->slug }}">

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

                <!-- DATE -->

                <input
                    type="date"
                    id="date-filter"
                    class="px-4 py-3 rounded-xl border
                    dark:bg-[#111827]
                    dark:text-white
                    dark:border-gray-700"
                >

            </div>

            

            <!-- BLOG LIST -->

            <div
                id="posts-container"
                class="space-y-6"
            >

                @foreach($latestPosts as $post)

                   <!-- BLOG CARD -->
                        <div class="bg-white/90 dark:bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl shadow-xl p-4 flex gap-4 hover:shadow-2xl transition duration-300">
            
                            <!-- SMALL IMAGE -->
                            <div class="w-56 h-36 flex-shrink-0 overflow-hidden rounded-xl">
            
                                <img
                                    src="{{ asset('uploads/posts/' . $post->image) }}"
                                    class="w-full h-full object-cover"
                                >
            
                            </div>
            
                            <!-- CONTENT -->
                            <div class="flex flex-col justify-between flex-1 min-w-0">
                        
                            <!-- TOP -->
                            <div>

                                <div class="flex items-center gap-3 mb-2">

                                    <span class="bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1 rounded-full">
                                        {{ $post->category->name ?? 'General' }}
                                    </span>

                                </div>

                                <h3 class="text-xl font-bold mb-2 leading-snug text-gray-900 dark:text-white hover:text-blue-400 transition">
                                    {{ Str::limit($post->title, 60) }}

                                </h3>

                                <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">

                                    {{ Str::limit(strip_tags($post->content), 90) }}

                                </p>

                            </div>

                            <!-- BOTTOM -->
                            <div class="flex items-center justify-between mt-4">

                                <a href="{{ route('post.show', $post->slug) }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm transition">

                                    Read More

                                </a>

                               <div class="flex items-center gap-4">

                                    <span class="text-sm text-gray-500 dark:text-gray-400">

                                        {{ $post->created_at->format('d M Y') }}

                                    </span>

                                    <span class="text-sm text-gray-500 dark:text-gray-400">

                                        👁 {{ number_format($post->views) }} Views

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>
            <!-- PAGINATION -->
            <div class="mt-10">
                {{ $latestPosts->links() }}
            </div>

        </div>

        <!-- SIDEBAR -->
        <div class="lg:col-span-4">
            <!-- WHATSAPP JOIN -->
            <div class="bg-green-500 rounded-2xl shadow-lg p-6 mb-8 text-white">

                <div class="flex items-center gap-4 mb-4">

                    <div class="bg-white text-green-500 w-14 h-14 rounded-full flex items-center justify-center text-3xl font-bold">

                        💬

                    </div>

                    <div>

                        <h3 class="text-2xl font-bold">
                            Join WhatsApp
                        </h3>

                        <p class="text-sm text-green-100">
                            Get instant job updates daily
                        </p>

                    </div>

                </div>

                <p class="text-sm leading-relaxed mb-5 text-green-50">

                    Join our WhatsApp channel for latest government jobs, admit cards, results and recruitment alerts.

                </p>

                <a href="https://chat.whatsapp.com/CPabgJ6XWjF1226zk11WPY?mode=gi_t&use_join_link=true"
                target="_blank"
                class="block text-center bg-white text-green-600 font-bold py-3 rounded-xl hover:bg-green-100 transition">

                    Join Now

                </a>

            </div>

            <!-- POPULAR POSTS -->
            <div class="bg-white/90 dark:bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl shadow-md p-6 mb-8">

                <h3 class="text-2xl font-bold mb-5 text-gray-900 dark:text-white">
                    Popular Posts
                </h3>

                <div class="space-y-5">

                    @foreach($popularPosts as $post)

                        <a href="{{ route('post.show', $post->slug) }}"
                        class="flex gap-4 border-b border-gray-200 dark:border-gray-700 pb-4 hover:text-blue-600 transition">

                            <!-- IMAGE -->
                            <img
                                src="{{ asset('uploads/posts/' . $post->image) }}"
                                class="w-20 h-20 object-cover rounded-lg"
                            >

                            <!-- CONTENT -->
                            <div class="flex-1">

                               <h4 class="font-semibold leading-snug mb-2">

                                    <span
                                        class="text-gray-900 dark:text-white
                                        hover:text-blue-600
                                        transition duration-300"
                                    >

                                        {{ Str::limit($post->title, 45) }}

                                    </span>

                                </h4>

                                <div class="text-sm text-gray-500 dark:text-gray-400">

                                    👁 {{ number_format($post->views) }} Views

                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>

            <!-- FEATURED POSTS -->
            <div class="bg-white/90 dark:bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl shadow-md p-6 mb-8">

                <h3 class="text-2xl font-bold mb-5 text-gray-900 dark:text-white">
                    Featured Posts
                </h3>

                <div class="space-y-4">

                   @foreach($featuredPosts as $post)

                    <a
                        href="{{ route('post.show', $post->slug) }}"
                        class="flex gap-4 border-b border-gray-200
                        dark:border-gray-700 pb-4
                        hover:text-blue-600 transition"
                    >

                        <!-- IMAGE -->

                        <img
                            src="{{ asset('uploads/posts/' . $post->image) }}"
                            class="w-20 h-20 object-cover rounded-xl"
                        >

                        <!-- CONTENT -->

                        <div class="flex-1">

                            <h4 class="font-semibold leading-snug
                            text-gray-900 dark:text-white
                            hover:text-blue-600 transition">

                                {{ Str::limit($post->title, 40) }}

                            </h4>

                            <div class="text-sm text-gray-500
                            dark:text-gray-400 mt-2">

                                ⭐ Featured Post

                            </div>

                        </div>

                    </a>

                @endforeach

                </div>

            </div>

            <!-- CATEGORIES -->
            <div class="bg-white/90 dark:bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl shadow-md p-6">

                <h3 class="text-2xl font-bold mb-5 text-gray-900 dark:text-white">
                    Categories
                </h3>

                <div class="flex flex-wrap gap-3">

                    @foreach($categories as $category)

                       <a href="{{ route('category.posts', $category->slug) }}"
                        class="inline-block bg-blue-100 text-blue-700
                                hover:bg-blue-700 hover:text-white
                                px-5 py-2 rounded-lg
                                font-semibold text-sm
                                transition duration-300 ease-in-out">

                            {{ $category->name }}

                        </a>
                    @endforeach

                </div>

            </div>

        </div>

    </div>

    <script>

        // MOBILE MENU
        const menuBtn = document.getElementById('menu-btn');

        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {

            mobileMenu.classList.toggle('hidden');

        });

        // DARK MODE
        const toggle = document.getElementById('darkToggle');
        const mobileDarkToggle = document.getElementById('mobileDarkToggle');

        toggle.addEventListener('click', () => {

            document.documentElement.classList.toggle('dark');

            if(document.documentElement.classList.contains('dark')) {

                localStorage.setItem('theme', 'dark');

            } else {

                localStorage.setItem('theme', 'light');

            }

        });

        mobileDarkToggle.addEventListener('click', () => {

            document.documentElement.classList.toggle('dark');

            if(document.documentElement.classList.contains('dark')) {

                localStorage.setItem('theme', 'dark');

            } else {

                localStorage.setItem('theme', 'light');

            }

        });

        // LOAD SAVED THEME
        if(localStorage.getItem('theme') === 'dark') {

            document.documentElement.classList.add('dark');

        }

    </script>
    <script>

document.addEventListener('DOMContentLoaded', function () {

    const categoryFilter =
        document.getElementById('category-filter');

    const dateFilter =
        document.getElementById('date-filter');

    function filterPosts() {

        const category = categoryFilter.value;

        const date = dateFilter.value;

        fetch(
            `/filter-posts?category=${category}&date=${date}`
        )
        .then(response => response.json())
        .then(data => {

            document.getElementById('posts-container')
                .innerHTML = data.html;

        });

    }

    categoryFilter.addEventListener(
        'change',
        filterPosts
    );

    dateFilter.addEventListener(
        'change',
        filterPosts
    );

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