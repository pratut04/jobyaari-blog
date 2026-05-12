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
                    <a href="#" class="hover:text-blue-600 transition">
                        Jobs
                    </a>
                </li>

                <li>
                    <a href="#" class="hover:text-blue-600 transition">
                        Results
                    </a>
                </li>

                <li>
                    <a href="#" class="hover:text-blue-600 transition">
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

            <a href="#" class="block hover:text-blue-600 transition">
                Jobs
            </a>

            <a href="#" class="block hover:text-blue-600 transition">
                Results
            </a>

            <a href="#" class="block hover:text-blue-600 transition">
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


<script>

    // MOBILE MENU

    const menuBtn = document.getElementById('menu-btn');

    const mobileMenu = document.getElementById('mobile-menu');

    if(menuBtn) {

        menuBtn.addEventListener('click', () => {

            mobileMenu.classList.toggle('hidden');

        });

    }

    // DARK MODE BUTTONS

    const toggle = document.getElementById('darkToggle');

    const mobileDarkToggle = document.getElementById('mobileDarkToggle');

    // DESKTOP TOGGLE

    if(toggle) {

        toggle.addEventListener('click', () => {

            document.documentElement.classList.toggle('dark');

            if(document.documentElement.classList.contains('dark')) {

                localStorage.setItem('theme', 'dark');

            } else {

                localStorage.setItem('theme', 'light');

            }

        });

    }

    // MOBILE TOGGLE

    if(mobileDarkToggle) {

        mobileDarkToggle.addEventListener('click', () => {

            document.documentElement.classList.toggle('dark');

            if(document.documentElement.classList.contains('dark')) {

                localStorage.setItem('theme', 'dark');

            } else {

                localStorage.setItem('theme', 'light');

            }

        });

    }

    // LOAD SAVED THEME

    if(localStorage.getItem('theme') === 'dark') {

        document.documentElement.classList.add('dark');

    }

</script>