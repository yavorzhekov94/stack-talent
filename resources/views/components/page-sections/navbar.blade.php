<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">StackTalents</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <x-navbar-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-navbar-link>
            <x-navbar-link href="{{ route('about') }}" :active="request()->routeIs('about')">About</x-navbar-link>
            <x-navbar-link href="{{ route('jobs') }}" :active="request()->routeIs('jobs')">Jobs</x-navbar-link>
            <x-navbar-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">Contact</x-navbar-link>
        </div>
        <div class="dropdown">
            <button class="btn-user-icon rounded-circle d-flex align-items-center justify-content-center"
                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                @guest
                    <li><a class="dropdown-item" href="{{ route('login')  }}">Login</a></li>
                    <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                @endguest
                @auth
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Log Out</a></li>
                @endauth
            </ul>
        </div>
        @auth
            <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
        @endauth
    </div>
</nav>
