<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">Ayon Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : ''}}  " href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('admin/category','admin/category/create') ? 'active' : ''}}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{ request()->is('admin/category/create') ? 'active' : ''}} " href="{{ route('admin.category.create') }}">Add Category</a>
                        <a class="dropdown-item {{ request()->is('admin/category') ? 'active' : ''}}" href="{{ route('admin.category.index') }}">Manage Category</a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('admin/category','admin/category/create') ? 'active' : ''}}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Posts
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{ request()->is('admin/category/create') ? 'active' : ''}} " href="{{ route('admin.post.create') }}">Add Post</a>
                        <a class="dropdown-item {{ request()->is('admin/category') ? 'active' : ''}}" href="{{ route('admin.post.index') }}">Manage Posts</a>

                </li>

                @auth()
                    {{--{{ auth()->user()->name }}--}}
                    <li class="nav-item">
                       {{-- <a class="nav-link" href="{{ route('user.logout') }}">Logout</a>--}}
                        <form action="{{ route('user.logout') }}" method="post">
                            @csrf
                            <a class="nav-link" href="{{ route('user.logout') }}" onclick="event.preventDefault(); this.closest('form').submit()">Logout</a>

                           {{-- <button type="submit" class="btn btn-danger">Logout</button>--}}

                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
