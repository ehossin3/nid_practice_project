@extends('admin.layouts')
@section('content')
    <h2 class="mt-5">All Voter</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name (BN)</th>
                <th>ID No</th>
                <th>Blood</th>
                <th>District</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($voters as $voter)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $voter->name_bn }}</td>
                    <td>{{ $voter->id_no }}</td>
                    <td>{{ $voter->blood->name }}</td>
                    <td>{{ $voter->district }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('voter.show', $voter->id) }}" class="btn btn-sm btn-dark"><i class="bi bi-eye"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $voters->links() }}
    </div>
@endsection
