<nav class="col-md-2 d-none d-md-block sidebar">
    <div class="text-center mb-4">
        <h4>ID Card</h4>
        <p class="small">Dashboard</p>
    </div>
    <a href="/dashboard"><i class="fas fa-home me-2"></i>Home</a>
    <a href="{{ route('id.info') }}"><i class="fas fa-id-card me-2"></i>ID Info</a>
    <a href="{{ route('nid.create') }}"><i class="fas fa-id-card me-2"></i>Create NID</a>
    <a href="/settings"><i class="fas fa-cog me-2"></i>Settings</a>
    @auth
        <form method="POST" action="{{ route('logout') }}" class="mt-4 px-3">
            @csrf
            <button class="btn btn-outline-light w-100" type="submit"><i
                    class="fas fa-sign-out-alt me-2"></i>Logout</button>
        </form>
    @endauth
</nav>
