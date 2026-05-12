<x-app-layout>

    <div class="container mt-5">

        <div class="card p-4">

            <h2 class="fw-bold mb-4">
                Add Category
            </h2>

            <form action="{{ route('categories.store') }}"
                  method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Category Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Enter category name">

                    @error('name')

                        <small class="text-danger">

                            {{ $message }}

                        </small>

                    @enderror

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Create Category

                </button>

                <a href="{{ route('categories.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>

</x-app-layout>