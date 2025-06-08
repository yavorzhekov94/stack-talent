<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">JobEntry</h1>
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
        <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
