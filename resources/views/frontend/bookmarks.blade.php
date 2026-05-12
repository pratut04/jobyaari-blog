@php
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en" class="transition duration-300">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Saved Posts
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100 dark:bg-[#020617] dark:text-white min-h-screen transition duration-300">

<!-- NAVBAR -->

<nav class="bg-white dark:bg-[#020617] border-b border-gray-200 dark:border-gray-800 shadow-md sticky top-0 z-50 transition duration-300">

    <div class="max-w-7xl mx-auto px-5 py-4 flex items-center justify-between">

        <!-- LOGO -->

        <a href="/" class="flex items-center gap-3">

            <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-xl">

                JY

            </div>

            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">

                JobYaari

            </h1>

        </a>

        <!-- DESKTOP MENU -->

        <ul class="hidden md:flex items-center gap-8 font-medium">

            <li>
                <a href="/" class="text-gray-700 dark:text-white hover:text-blue-600 transition">
                    Home
                </a>
            </li>

            <li>
                <a href="{{ route('bookmarks.index') }}"
                   class="text-blue-600 font-semibold">
                    Saved Posts
                </a>
            </li>

            <!-- DARK MODE BUTTON -->

            <li>

                <button
                    id="darkToggle"
                    class="bg-gray-200 dark:bg-[#1e293b] dark:text-white px-4 py-2 rounded-xl transition"
                >

                    🌙

                </button>

            </li>

        </ul>

        <!-- MOBILE BUTTON -->

        <button
            id="menu-btn"
            class="md:hidden text-3xl text-gray-800 dark:text-white"
        >

            ☰

        </button>

    </div>

    <!-- MOBILE MENU -->

    <div
        id="mobile-menu"
        class="hidden md:hidden px-5 pb-5"
    >

        <div class="bg-white dark:bg-[#0f172a] border border-gray-200 dark:border-gray-700 rounded-2xl p-5 space-y-5 shadow-xl">

            <a href="/" class="block text-gray-700 dark:text-white hover:text-blue-600 transition">
                Home
            </a>

            <a href="{{ route('bookmarks.index') }}"
               class="block text-blue-600 font-semibold">

                Saved Posts

            </a>

            <!-- MOBILE DARK MODE -->

            <button
                id="mobileDarkToggle"
                class="w-full flex items-center justify-between
                bg-gray-100 dark:bg-[#1e293b]
                px-4 py-3 rounded-xl
                text-gray-800 dark:text-white transition"
            >

                <span>
                    🌙 Dark Mode
                </span>

                <span id="mobileThemeText">

                    Dark

                </span>

            </button>

        </div>

    </div>

</nav>

<!-- PAGE -->

<div class="max-w-6xl mx-auto py-10 px-5">

    <h1 class="text-4xl font-bold mb-10 text-gray-900 dark:text-white">

        🔖 Saved Posts

    </h1>

    <div class="space-y-6">

        @forelse($bookmarks as $bookmark)

            <div class="bg-white dark:bg-[#111827] rounded-2xl shadow-md p-5 flex flex-col md:flex-row gap-5 transition duration-300">

                <img
                    src="{{ asset('uploads/posts/' . $bookmark->post->image) }}"
                    class="w-full md:w-48 h-48 md:h-32 object-cover rounded-xl"
                >

                <div class="flex-1">

                    <h2 class="text-2xl font-bold mb-3 text-gray-900 dark:text-white">

                        {{ $bookmark->post->title }}

                    </h2>

                    <p class="text-gray-600 dark:text-gray-300 mb-4">

                        {{ Str::limit(strip_tags($bookmark->post->content), 120) }}

                    </p>

                    <a
                        href="{{ route('post.show', $bookmark->post->slug) }}"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition"
                    >

                        Read Post

                    </a>

                    <form
                        action="{{ route('bookmark.destroy', $bookmark->post->id) }}"
                        method="POST"
                        class="inline-block ml-3"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg transition"
                        >

                            Remove

                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="bg-white dark:bg-[#111827] p-10 rounded-2xl text-center shadow-md">

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">

                    No Saved Posts

                </h2>

            </div>

        @endforelse

    </div>

</div>

<!-- SCRIPTS -->

<script>

    // MOBILE MENU

    const menuBtn = document.getElementById('menu-btn');

    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {

        mobileMenu.classList.toggle('hidden');

    });

    // DARK MODE

    const darkToggle = document.getElementById('darkToggle');

    const mobileDarkToggle = document.getElementById('mobileDarkToggle');

    const mobileThemeText = document.getElementById('mobileThemeText');

    function updateThemeText() {

        if(document.documentElement.classList.contains('dark')) {

            mobileThemeText.innerText = 'On';

        } else {

            mobileThemeText.innerText = 'Off';

        }

    }

    function toggleDarkMode() {

        document.documentElement.classList.toggle('dark');

        if(document.documentElement.classList.contains('dark')) {

            localStorage.setItem('theme', 'dark');

        } else {

            localStorage.setItem('theme', 'light');

        }

        updateThemeText();

    }

    darkToggle.addEventListener('click', toggleDarkMode);

    mobileDarkToggle.addEventListener('click', toggleDarkMode);

    // LOAD SAVED THEME

    if(localStorage.getItem('theme') === 'dark') {

        document.documentElement.classList.add('dark');

    }

    updateThemeText();

</script>

</body>
</html>