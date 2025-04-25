{{-- <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">NID Project</a>
        <div class="ms-auto">
            @auth
                <div class="d-flex items-center">

                </div>
            @endauth
        </div>
    </div>
</nav> --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Tracker</a>
        <div class="d-flex gap-3">
            @guest
                <a class=" nav-link text-white" href="{{ route('register') }}">Register</a>
                <a class=" nav-link text-white" href="{{ route('login') }}">Login</a>
            @endguest
            @auth
                <a class=" nav-link text-primary" href="{{ route('dash') }}">{{ Auth::user()->name }}</a>
                <a class=" nav-link text-white" href="{{ route('logout') }}">Logout?</a>
            @endauth
        </div>
    </div>
</nav>
