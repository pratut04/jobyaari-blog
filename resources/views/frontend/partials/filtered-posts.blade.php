@forelse($posts as $post)

<div class="bg-white dark:bg-[#111827]
rounded-2xl shadow-md overflow-hidden
transition duration-300">

    <img
        src="{{ asset('uploads/posts/' . $post->image) }}"
        class="w-full h-56 object-cover"
    >

    <div class="p-6">

        <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">

            {{ $post->created_at->format('d M Y') }}

        </p>

        <h2 class="text-2xl font-bold mb-4
        text-gray-900 dark:text-white">

            {{ $post->title }}

        </h2>

        <p class="text-gray-600 dark:text-gray-300 mb-5">

            {{ \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}

        </p>

        <a
            href="{{ route('post.show', $post->slug) }}"
            class="bg-blue-600 hover:bg-blue-700
            text-white px-5 py-2 rounded-lg transition"
        >

            Read More

        </a>

    </div>

</div>

@empty

<div class="bg-white dark:bg-[#111827]
p-10 rounded-2xl text-center">

    <h2 class="text-2xl font-bold
    text-gray-900 dark:text-white">

        No Posts Found

    </h2>

</div>

@endforelse