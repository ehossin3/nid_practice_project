@extends('admin.layouts')
@section('content')
    <div class="content">
        <h2 class="mb-4">Dashboard Overview</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-users me-2"></i>Total Users</h5>
                        <p class="card-text fs-4">1,204</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-id-card me-2"></i>Total ID Cards</h5>
                        <p class="card-text fs-4">658</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-clock me-2"></i>Pending Requests</h5>
                        <p class="card-text fs-4">15</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
