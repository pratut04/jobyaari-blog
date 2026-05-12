<x-guest-layout>

<div class="min-h-screen flex bg-[#020617]">

    <!-- LEFT SIDE -->

    <div class="hidden lg:flex w-1/2 relative overflow-hidden
    bg-gradient-to-br from-indigo-700 via-blue-800 to-black">

        <!-- GLOW EFFECTS -->

        <div class="absolute w-96 h-96 bg-blue-500/30
        blur-3xl rounded-full -top-20 -left-20"></div>

        <div class="absolute w-96 h-96 bg-purple-500/20
        blur-3xl rounded-full bottom-0 right-0"></div>

        <!-- CONTENT -->

        <div class="relative z-10 flex flex-col justify-center
        px-20 text-white">

            <div class="flex items-center gap-4 mb-10">

                <div class="w-20 h-20 rounded-3xl
                bg-white/10 backdrop-blur-xl
                flex items-center justify-center
                text-4xl font-bold border border-white/20">

                    JY

                </div>

                <div>

                    <h1 class="text-5xl font-extrabold">

                        JobYaari

                    </h1>

                    <p class="text-blue-200 mt-2">

                        Career & Blog Platform

                    </p>

                </div>

            </div>

            <h2 class="text-6xl font-black leading-tight">

                Create <br> Account

            </h2>

            <p class="mt-8 text-xl text-blue-100 leading-relaxed">

                Join our platform to explore blogs,
                interact with posts, save articles,
                and stay connected with modern
                tech and career updates.

            </p>

            <!-- FEATURES -->

            <div class="mt-12 space-y-5">

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-xl
                    bg-white/10 flex items-center
                    justify-center text-2xl">

                        📚

                    </div>

                    <p class="text-lg">

                        Read Modern Tech Blogs

                    </p>

                </div>

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-xl
                    bg-white/10 flex items-center
                    justify-center text-2xl">

                        ❤️

                    </div>

                    <p class="text-lg">

                        Like & Save Favorite Posts

                    </p>

                </div>

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-xl
                    bg-white/10 flex items-center
                    justify-center text-2xl">

                        ⚡

                    </div>

                    <p class="text-lg">

                        Fast AJAX Experience

                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- RIGHT SIDE -->

    <div class="w-full lg:w-1/2 flex items-center
    justify-center px-6 py-10 bg-gray-100 dark:bg-[#020617]">

        <div class="w-full max-w-md">

            <!-- MOBILE LOGO -->

            <div class="lg:hidden text-center mb-10">

                <div class="w-20 h-20 bg-blue-600
                rounded-3xl flex items-center
                justify-center text-white
                text-3xl font-bold mx-auto shadow-2xl">

                    JY

                </div>

                <h1 class="text-4xl font-black mt-5
                text-gray-900 dark:text-white">

                    JobYaari

                </h1>

            </div>

            <!-- CARD -->

            <div class="bg-white/90 dark:bg-[#111827]/90
            backdrop-blur-2xl shadow-2xl rounded-[2rem]
            p-10 border border-gray-200 dark:border-gray-700">

                <div class="mb-10 text-center">

                    <h2 class="text-4xl font-black
                    text-gray-900 dark:text-white">

                        Register

                    </h2>

                    <p class="mt-3 text-gray-500
                    dark:text-gray-400">

                        Create your new account

                    </p>

                </div>

                <form method="POST"
                action="{{ route('register') }}"
                class="space-y-7">

                    @csrf

                    <!-- NAME -->

                    <div>

                        <label class="block mb-3
                        text-sm font-semibold
                        text-gray-700 dark:text-gray-300">

                            Full Name

                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            class="w-full rounded-2xl
                            border border-gray-300
                            dark:border-gray-700
                            bg-white dark:bg-[#0f172a]
                            dark:text-white
                            px-5 py-4
                            focus:ring-2
                            focus:ring-blue-500
                            outline-none transition"
                        >

                        <x-input-error
                            :messages="$errors->get('name')"
                            class="mt-2"
                        />

                    </div>

                    <!-- EMAIL -->

                    <div>

                        <label class="block mb-3
                        text-sm font-semibold
                        text-gray-700 dark:text-gray-300">

                            Email Address

                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full rounded-2xl
                            border border-gray-300
                            dark:border-gray-700
                            bg-white dark:bg-[#0f172a]
                            dark:text-white
                            px-5 py-4
                            focus:ring-2
                            focus:ring-blue-500
                            outline-none transition"
                        >

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"
                        />

                    </div>

                    <!-- PASSWORD -->

                    <div>

                        <label class="block mb-3
                        text-sm font-semibold
                        text-gray-700 dark:text-gray-300">

                            Password

                        </label>

                        <div class="relative">

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                class="w-full rounded-2xl
                                border border-gray-300
                                dark:border-gray-700
                                bg-white dark:bg-[#0f172a]
                                dark:text-white
                                px-5 py-4 pr-14
                                focus:ring-2
                                focus:ring-blue-500
                                outline-none transition"
                            >

                            <button
                                type="button"
                                onclick="togglePassword('password')"
                                class="absolute right-4 top-1/2
                                -translate-y-1/2 text-gray-500"
                            >

                                👁️

                            </button>

                        </div>

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"
                        />

                    </div>

                    <!-- CONFIRM PASSWORD -->

                    <div>

                        <label class="block mb-3
                        text-sm font-semibold
                        text-gray-700 dark:text-gray-300">

                            Confirm Password

                        </label>

                        <div class="relative">

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                class="w-full rounded-2xl
                                border border-gray-300
                                dark:border-gray-700
                                bg-white dark:bg-[#0f172a]
                                dark:text-white
                                px-5 py-4 pr-14
                                focus:ring-2
                                focus:ring-blue-500
                                outline-none transition"
                            >

                            <button
                                type="button"
                                onclick="togglePassword('password_confirmation')"
                                class="absolute right-4 top-1/2
                                -translate-y-1/2 text-gray-500"
                            >

                                👁️

                            </button>

                        </div>

                    </div>

                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="w-full py-4 rounded-2xl
                        bg-gradient-to-r
                        from-blue-600 to-indigo-700
                        hover:scale-[1.02]
                        text-white font-bold text-lg
                        shadow-xl transition duration-300"
                    >

                        Create Account

                    </button>

                    <!-- LOGIN -->

                    <p class="text-center text-gray-600
                    dark:text-gray-400">

                        Already have an account?

                        <a
                            href="{{ route('login') }}"
                            class="text-blue-600
                            font-semibold hover:underline"
                        >

                            Login

                        </a>

                    </p>

                </form>

            </div>

        </div>

    </div>

</div>

<!-- SHOW PASSWORD SCRIPT -->

<script>

function togglePassword(id) {

    const input = document.getElementById(id);

    if(input.type === 'password') {

        input.type = 'text';

    } else {

        input.type = 'password';

    }

}

</script>

</x-guest-layout>