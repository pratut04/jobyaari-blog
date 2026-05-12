<x-app-layout>

    <div class="container mt-4">

        <div class="card p-4 shadow-sm">

            <div class="d-flex justify-content-between mb-4">

                <h3 class="fw-bold">
                    Featured Posts
                </h3>

                <a href="{{ route('posts.index') }}"
                class="btn btn-primary">

                    Back

                </a>

            </div>

            <table class="table table-bordered align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($posts as $post)

                        <tr>

                            <td>{{ $post->id }}</td>

                            <td>

                                @if($post->image)

                                    <img src="{{ asset('uploads/posts/' . $post->image) }}"
                                        width="80"
                                        class="rounded">

                                @endif

                            </td>

                           <td>

                                <a href="{{ route('posts.show', $post) }}"
                                 class="featured-title">

                                    {{ $post->title }}

                                </a>

                            </td>

                            <td>

                                <span class="badge bg-success">
                                    {{ $post->status }}
                                </span>

                            </td>

                            <td>

                                <span class="badge bg-warning text-dark">
                                    Featured
                                </span>

                            </td>

                            <td>

                                <a href="{{ route('posts.show', $post) }}"
                                class="btn btn-info btn-sm">

                                    View

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center">

                                No featured posts found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>

<style>

.featured-title{
    color:#0d6efd;
    font-weight:bold;
    text-decoration:none;
    transition:0.3s;
}

.featured-title:hover{
    text-decoration:underline;
    color:#084298;
}

</style>