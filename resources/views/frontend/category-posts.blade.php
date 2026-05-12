@php
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gradient-to-br dark:from-[#020617] dark:via-[#071129] dark:to-black dark:text-white transition duration-300 min-h-screen">

<div class="max-w-6xl mx-auto py-10 px-5">
    <!-- BACK BUTTON -->

<!-- TOP ACTIONS -->

<div class="flex items-center justify-between mb-8">

    <!-- BACK BUTTON -->

    <a
        href="{{ url()->previous() }}"
        class="inline-flex items-center gap-2
        text-gray-700 dark:text-gray-300
        hover:text-blue-600 dark:hover:text-blue-400
        dark:text-gray-300 dark:hover:text-blue-400
        font-medium transition duration-300"
    >

        ← Back

    </a>

    <!-- HOME BUTTON -->

    <a
        href="/"
        class="inline-flex items-center gap-3
        bg-blue-600 hover:bg-blue-700
        text-white
        px-6 py-3 rounded-2xl
        shadow-lg hover:shadow-xl
        transition duration-300
        font-semibold"
    >

        🏠 Home

    </a>

</div>

</div>

    <h1 class="text-4xl font-bold mb-10 text-gray-900 dark:text-white">
        {{ $category->name }} Posts
    </h1>

    <div class="space-y-6">

        @forelse($posts as $post)

            <div class="bg-white dark:bg-[#111827]
                rounded-2xl shadow-md p-4 flex gap-5
                border border-gray-200 dark:border-gray-700">

                <!-- IMAGE -->
                <div class="w-48 h-32 flex-shrink-0 overflow-hidden rounded-xl">

                    <img
                        src="{{ asset('uploads/posts/' . $post->image) }}"
                        class="w-full h-full object-cover"
                    >

                </div>

                <!-- CONTENT -->
                <div class="flex-1 flex flex-col justify-between">

                    <div>

                        <h2 class="text-xl font-bold mb-2
                            text-gray-900 dark:text-white
                            hover:text-blue-600 transition">
                            {{ $post->title }}
                        </h2>

                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            {{ Str::limit(strip_tags($post->content), 120) }}
                        </p>

                    </div>

                    <div class="flex items-center justify-between mt-4">

                        <a href="{{ route('post.show', $post->slug) }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">

                            Read More

                        </a>

                        <span class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $post->created_at->format('d M Y') }}
                        </span>

                    </div>

                </div>

            </div>

        @empty

            <div class="bg-white dark:bg-[#111827]
                p-8 rounded-2xl shadow-md text-center">

                <h2 class="text-2xl font-bold
                    text-gray-700 dark:text-white">
                    No Posts Found
                </h2>

            </div>

        @endforelse

    </div>

    <div class="mt-10">
        {{ $posts->links() }}
    </div>


</div>

<script>

    if(localStorage.getItem('theme') === 'dark') {

        document.documentElement.classList.add('dark');

    }

</script>

</body>
</html>