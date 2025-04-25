<nav class="navbar navbar-expand navbar-light navbar-custom">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold">Welcome, {{ Auth::user()->name }}</span>
        <div class="d-flex align-items-center">
            <span class="badge bg-primary text-uppercase me-3">{{ Auth::user()->role }}</span>
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
                class="rounded-circle" width="40" height="40" alt="User">
        </div>
    </div>
</nav>