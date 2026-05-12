<x-app-layout>

    <div class="container mt-5">

    <div class="row">

        <!-- Main Content -->
        <div class="col-lg-8">

        <div class="card p-4">


           @if($post->image)

                <img src="{{ asset('uploads/posts/' . $post->image) }}"
                    class="img-fluid rounded mb-4 shadow"
                    style="max-height:400px;
                        width:100%;
                        object-fit:contain;
                        cursor:pointer;"
                    data-bs-toggle="modal"
                    data-bs-target="#imageModal">

                <!-- Modal -->
                <div class="modal fade"
                    id="imageModal"
                    tabindex="-1">

                    <div class="modal-dialog modal-dialog-centered modal-xl">

                        <div class="modal-content">

                            <div class="modal-body text-center">

                                <img src="{{ asset('uploads/posts/' . $post->image) }}"
                                    class="img-fluid rounded">

                            </div>

                        </div>

                    </div>

                </div>

            @endif

            @if($post->category)

                <span class="badge bg-dark mb-3">
                    {{ $post->category->name }}
                </span>

            @endif

            <h1 class="fw-bold mb-3">
                {{ $post->title }}
            </h1>

            <p class="text-muted">
                {{ $post->created_at->format('d M Y') }}
            </p>

            <hr>

            <div>
                {!! $post->content !!}
            </div>
            <hr class="my-5">

            <h3 class="fw-bold mb-4">
                Related Posts
            </h3>

            <div class="row">

                @forelse($relatedPosts as $related)

                    <div class="col-md-4 mb-4">

                        <div class="card h-100 shadow-sm">

                            @if($related->image)

                                <img src="{{ asset('uploads/posts/' . $related->image) }}"
                                    class="card-img-top"
                                    style="height:200px;
                                        object-fit:cover;">

                            @endif

                            <div class="card-body">

                                <h5 class="fw-bold">

                                   <a href="{{ route('posts.show', $related) }}"
                                        class="related-post-link">

                                        {{ $related->title }}

                                    </a>

                                </h5>

                                <p class="text-muted small">
                                    {{ $related->created_at->format('d M Y') }}
                                </p>

                            </div>

                        </div>

                    </div>

                @empty

                    <p>No related posts found.</p>

                @endforelse

            </div>

            <div class="mt-4">

                <a href="{{ route('posts.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </div>

        </div>

    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">

            <div class="card shadow-sm p-3">

                <h4 class="fw-bold mb-4">
                    Latest Posts
                </h4>

                @foreach($latestPosts as $latest)

                    <div class="mb-3 border-bottom pb-3">

                        @if($latest->image)

                            <img src="{{ asset('uploads/posts/' . $latest->image) }}"
                                class="img-fluid rounded mb-2"
                                style="height:150px;
                                       width:100%;
                                       object-fit:cover;">

                        @endif

                        <h6 class="fw-bold">

                            <a href="{{ route('posts.show', $latest) }}"
                               class="related-post-link">

                                {{ $latest->title }}

                            </a>

                        </h6>

                        <p class="text-muted small mb-0">
                            {{ $latest->created_at->format('d M Y') }}
                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

</x-app-layout>

<style>

.related-post-link{
    text-decoration:none;
    color:#0d6efd;
    transition:0.3s;
}

.related-post-link:hover{
    text-decoration:underline;
    color:#084298;
}

</style>