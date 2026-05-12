

<x-app-layout>

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="mb-0">All Posts</h2>

            <div class="d-flex gap-2">

                <a href="{{ route('posts.create') }}"
                class="btn btn-primary">
                    Add New Post
                </a>

                <a href="{{ route('posts.trash') }}"
                class="btn btn-dark">
                    Trash
                </a>

            </div>

        </div>

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        <!-- <form method="GET"
            action="{{ route('posts.index') }}"
            class="mb-4">

            <div class="input-group">

                <input type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search posts..."
                    value="{{ request('search') }}">

                <button class="btn btn-dark">
                    Search
                </button>

            </div>

        </form> -->

        <div class="card p-4">
            <div class="table-responsive">

                <table class="table table-bordered table-striped align-middle"
                    id="postsTable">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th width="220">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($posts as $post)

                            <tr>

                                <td>
                                    {{ $post->id }}
                                </td>

                                <td>

                                    @if($post->image)

                                        <img src="{{ asset('uploads/posts/' . $post->image) }}"
                                            style="width:80px;
                                                height:60px;
                                                object-fit:cover;
                                                cursor:pointer;"
                                            class="rounded shadow-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#imageModal{{ $post->id }}">

                                        <!-- Modal -->
                                        <div class="modal fade"
                                            id="imageModal{{ $post->id }}"
                                            tabindex="-1">

                                            <div class="modal-dialog modal-dialog-centered modal-lg">

                                                <div class="modal-content">

                                                    <div class="modal-body text-center">

                                                        <img src="{{ asset('uploads/posts/' . $post->image) }}"
                                                            class="img-fluid rounded">

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    @endif

                                </td>

                                <td>

                                    @if($post->category)

                                        <span class="badge bg-dark">
                                            {{ $post->category->name }}
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('posts.show', $post) }}"
                                    class="post-title-link fw-bold">

                                        {{ $post->title }}

                                    </a>

                                </td>

                                <td>
                                    {{ $post->slug }}
                                </td>

                                <td>
                                    {{ $post->created_at->format('d M Y') }}
                                </td>

                                <td>

                                    @if($post->status == 'Published')

                                        <span class="badge bg-success">
                                            Published
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Draft
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    @if($post->is_featured)

                                        <span class="badge bg-warning text-dark">
                                            Featured
                                        </span>

                                    @else

                                        <span class="badge bg-light text-dark">
                                            Normal
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <div class="d-flex gap-2">

                                        <a href="{{ route('posts.show', $post) }}"
                                        class="btn btn-info btn-sm">
                                            View
                                        </a>

                                        <a href="{{ route('posts.edit', $post) }}"
                                        class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('posts.destroy', $post) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">

                                                Delete

                                            </button>

                                        </form>

                                    </div>

                                </td>
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            

        </div>

    </div>

</x-app-layout>


<style>


.post-title-link{
    text-decoration:none;
    color:#0d6efd;
    transition:0.3s;
}

.post-title-link:hover{
    text-decoration:underline;
    color:#084298;
}

</style>

<script>

$(document).ready(function () {

    $('#postsTable').DataTable({
        pageLength: 5,
        order: [[0, 'desc']]
    });

});

</script>