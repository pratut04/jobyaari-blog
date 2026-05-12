@php
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gradient-to-br dark:from-[#020617] dark:via-[#071129] dark:to-black dark:text-white transition duration-300 min-h-screen">

<div class="max-w-6xl mx-auto py-10 px-5">

    <h1 class="text-4xl font-bold mb-8 text-gray-900 dark:text-white">
        Search Results for "{{ $query }}"
    </h1>

    <a href="{{ route('home') }}"
            class="inline-flex items-center gap-2
        mb-8 bg-blue-600 hover:bg-blue-700
        text-white px-6 py-3 rounded-2xl
        shadow-lg hover:shadow-xl
        transition duration-300 font-semibold">

        ← Back to Home

    </a>

    <div class="space-y-6">

        @forelse($posts as $post)

            <div class="bg-white dark:bg-[#111827]
                rounded-xl shadow-md p-5 flex gap-5
                border border-gray-200 dark:border-gray-700">

                <img
                    src="{{ asset('uploads/posts/' . $post->image) }}"
                    class="w-48 h-32 object-cover rounded-lg"
                >

                <div>

                    <h2 class="text-2xl font-bold mb-2 text-gray-900 dark:text-white">
                        {{ $post->title }}
                    </h2>

                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        {{ Str::limit(strip_tags($post->content), 120) }}
                    </p>

                    <a href="{{ route('post.show', $post->slug) }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded-lg">

                        Read More

                    </a>

                </div>

            </div>

        @empty

            <div class="bg-white dark:bg-[#111827]
             p-8 rounded-xl shadow-md text-center">

                <h2 class="text-2xl font-bold text-gray-700 dark:text-white">
                    No Results Found
                </h2>

            </div>

        @endforelse

    </div>

    <!-- PAGINATION -->
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