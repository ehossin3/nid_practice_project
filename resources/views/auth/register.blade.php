@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 400px;">
            <h3 class="text-center mb-4">📝 Register</h3>

            <form method="POST" action="{{ route('user.create') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="registerPassword" class="form-control" required>
                        <span class="input-group-text toggle-password" data-target="#registerPassword"
                            style="cursor: pointer;">
                            <i class="bi bi-eye-fill"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Register</button>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}">Already have an account? Login</a>
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
