<x-app-layout>

<div class="container mt-5">

    <div class="card p-4">

        <div class="d-flex justify-content-between mb-4">

            <h2>Trashed Posts</h2>

            <a href="{{ route('posts.index') }}"
               class="btn btn-primary">
                Back
            </a>

        </div>

        <table class="table table-bordered">

            <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

                @forelse($posts as $post)

                    <tr>

                        <td>{{ $post->id }}</td>

                        <td>{{ $post->title }}</td>

                        <td>
                            {{ $post->deleted_at->format('d M Y') }}
                        </td>

                        <td class="d-flex gap-2">

                            <form action="{{ route('posts.restore', $post->id) }}"
                                  method="POST">

                                @csrf

                                <button class="btn btn-success btn-sm">
                                    Restore
                                </button>

                            </form>

                            <form action="{{ route('posts.forceDelete', $post->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Permanent delete?')">

                                    Delete Permanently

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4">
                            No trashed posts
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>