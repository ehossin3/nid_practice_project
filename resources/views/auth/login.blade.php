@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 400px;">
            <h3 class="text-center mb-4">🔐 Login</h3>

            <form method="POST" action="{{ route('user.login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="loginPassword" class="form-control" required>
                        <span class="input-group-text toggle-password" data-target="#loginPassword"
                            style="cursor: pointer;">
                            <i class="bi bi-eye-fill"></i>
                        </span>
                    </div>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>

                <div class="text-center mt-3">
                    <a href="{{ route('register') }}">Don't have an account? Register</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).on('click', '.toggle-password', function() {
            const target = $($(this).data('target'));
            const icon = $(this).find('i');

            if (target.attr('type') === 'password') {
                target.attr('type', 'text');
                icon.removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
            } else {
                target.attr('type', 'password');
                icon.removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
            }
        });
    </script>
@endpush
