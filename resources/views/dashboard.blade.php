<x-app-layout>

    <div class="container mt-5">

        <h2 class="mb-4 fw-bold">
            Admin Dashboard
        </h2>

        <div class="row">

            <!-- Total Posts -->
            <div class="col-md-3 mb-4">

                <div class="card shadow border-0 bg-primary text-white">

                    <div class="card-body">

                        <h5>Total Posts</h5>

                        <h2 class="fw-bold">
                            {{ $totalPosts }}
                        </h2>

                    </div>

                </div>

            </div>

            <!-- Published -->
            <div class="col-md-3 mb-4">

                <div class="card shadow border-0 bg-success text-white">

                    <div class="card-body">

                        <h5>Published</h5>

                        <h2 class="fw-bold">
                            {{ $publishedPosts }}
                        </h2>

                    </div>

                </div>

            </div>

            <!-- Draft -->
            <div class="col-md-3 mb-4">

                <div class="card shadow border-0 bg-secondary text-white">

                    <div class="card-body">

                        <h5>Draft Posts</h5>

                        <h2 class="fw-bold">
                            {{ $draftPosts }}
                        </h2>

                    </div>

                </div>

            </div>

            <!-- Trash -->
            <div class="col-md-3 mb-4">

                <div class="card shadow border-0 bg-danger text-white">

                    <div class="card-body">

                        <h5>Trash Posts</h5>

                        <h2 class="fw-bold">
                            {{ $trashedPosts }}
                        </h2>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>