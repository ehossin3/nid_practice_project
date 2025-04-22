<!DOCTYPE html>
<html lang="en">

<head>
    <title>ID Card System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    @stack('styles')
</head>

<body>
    @include('partials.nav')
    <div class="container mt-4">
        @yield('content')
    </div>

    @stack('scripts')
</body>

</html>
