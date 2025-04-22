<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="">Admin Panel</a>
        <div class="ms-auto">
            <form action="{{ route('logout') }}" method="POST">@csrf
                <button class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</nav>
