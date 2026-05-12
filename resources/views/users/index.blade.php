<x-app-layout>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h3 class="fw-bold">
            Users Management
        </h3>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card p-4 shadow-sm">

        <table class="table table-bordered align-middle">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>{{ $user->id }}</td>

                        <td>
                            {{ $user->name }}
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>

                        <td>

                            @if($user->role == 'admin')

                                <span class="badge bg-danger">
                                    Admin
                                </span>

                            @else

                                <span class="badge bg-primary">
                                    User
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $user->created_at->format('d M Y') }}
                        </td>

                        <td class="d-flex gap-2">

                            @if(Auth::id() != $user->id)

                                <!-- Change Role -->
                                <form action="{{ route('users.changeRole', $user) }}"
                                    method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button class="btn btn-warning btn-sm">

                                        Change Role

                                    </button>

                                </form>

                                <!-- Delete -->
                                <form action="{{ route('users.destroy', $user) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">

                                        Delete

                                    </button>

                                </form>

                           @else

                            @if($user->role == 'admin')

                                <span class="text-muted">

                                    Current Admin

                                </span>

                            @else

                                <span class="badge bg-primary">

                                    Logged In User

                                </span>

                            @endif

                        @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            No users found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>