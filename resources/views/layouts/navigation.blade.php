<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm px-4">

    <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand fw-bold text-primary"
        href="{{ route('dashboard') }}">

            Jobyaari Admin

        </a>

        <!-- Right User Dropdown -->
        <div class="dropdown">

            <button class="btn btn-light border dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown">

                {{ Auth::user()->name }}

            </button>

            <ul class="dropdown-menu dropdown-menu-end">

                <li>

                    <a class="dropdown-item"
                    href="{{ route('profile.edit') }}">

                        Profile

                    </a>

                </li>

                <li><hr class="dropdown-divider"></li>

                <li>

                    <form method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button type="submit"
                                class="dropdown-item text-danger">

                            Logout

                        </button>

                    </form>

                </li>

            </ul>

        </div>

    </div>

</nav>


<!-- Sidebar + Content -->
<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white p-3 sidebar-admin">

        <h5 class="fw-bold mb-4">
            Admin Panel
        </h5>

        <ul class="nav flex-column gap-2">

            <!-- Dashboard -->
            <li class="nav-item">

                <a href="{{ route('dashboard') }}"
                class="nav-link text-white sidebar-link
                {{ request()->routeIs('dashboard') ? 'active-sidebar' : '' }}">

                    Dashboard

                </a>

            </li>

            <!-- Posts -->
            <li class="nav-item">

               <a href="{{ route('posts.index') }}"
                class="nav-link text-white sidebar-link
                {{ request()->routeIs('posts.index', 'posts.create', 'posts.edit', 'posts.show') ? 'active-sidebar' : '' }}">

                    Posts

                </a>

            </li>

            <!-- Categories -->
            <li class="nav-item">

                <a href="{{ route('categories.index') }}"
                class="nav-link text-white sidebar-link
                {{ request()->routeIs('categories.*') ? 'active-sidebar' : '' }}">

                    Categories

                </a>

            </li>

            <!-- Trash -->
            <li class="nav-item">

                <a href="{{ route('posts.trash') }}"
                class="nav-link text-white sidebar-link
                {{ request()->routeIs('posts.trash') ? 'active-sidebar' : '' }}">

                    Trash Posts

                </a>

            </li>

            <!-- Featured -->
            <li class="nav-item">

                <a href="{{ route('featured.posts') }}"
                class="nav-link text-white sidebar-link
                {{ request()->routeIs('featured.posts') ? 'active-sidebar' : '' }}">

                    Featured Posts

                </a>

            </li>

            <!-- Users -->
            <li class="nav-item">

               <a href="{{ route('users.index') }}"
            class="nav-link text-white sidebar-link
            {{ request()->routeIs('users.*') ? 'active-sidebar' : '' }}">

                Users

            </a>

            </li>

            <!-- Settings -->
            <li class="nav-item">

                <a href="{{ route('settings.index') }}"
                class="nav-link text-white sidebar-link">

                    Settings

                </a>

            </li>

        </ul>

    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">

        {{ $slot }}

    </div>

</div>

<style>

.sidebar-admin{
    width:250px;
    min-height:100vh;
}

.sidebar-link{
    border-radius:10px;
    transition:0.3s;
    padding:12px 15px;
    font-size:17px;
}

.sidebar-link:hover{
    background:#0d6efd;
    padding-left:20px;
}

.active-sidebar{
    background:#0d6efd;
    font-weight:bold;
}

</style>