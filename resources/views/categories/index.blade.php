<x-app-layout>

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">
                Categories
            </h2>

            <a href="{{ route('categories.create') }}"
               class="btn btn-primary">

                Add Category

            </a>

        </div>

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        <div class="card p-4">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)

                        <tr>

                            <td>{{ $category->id }}</td>

                            <td class="fw-bold">
                                {{ $category->name }}
                            </td>

                            <td>{{ $category->slug }}</td>

                            <td class="d-flex gap-2">

                                <a href="{{ route('categories.edit', $category) }}"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('categories.destroy', $category) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this category?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4">

                                No categories found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>