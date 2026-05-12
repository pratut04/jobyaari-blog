<x-app-layout>

    <div class="container mt-5">

        <div class="card p-4">

            <h2 class="fw-bold mb-4">
                Edit Category
            </h2>

            <form action="{{ route('categories.update', $category) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Category Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ $category->name }}">

                    @error('name')

                        <small class="text-danger">

                            {{ $message }}

                        </small>

                    @enderror

                </div>

                <button type="submit"
                        class="btn btn-success">

                    Update Category

                </button>

                <a href="{{ route('categories.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>

</x-app-layout>