@extends('layouts.main')

@section('container')

<div class="text-end mb-3">
    <a href="{{ route('users.create') }}" type="button" class="btn btn-primary">+ Create</a>
</div>

<div class="card-content collapse show">
    <div class="card-body card-dashboard">

        <div class="table-responsive">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session ('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a class="btn btn-info d-inline" href="{{ route('users.edit', $user->id) }}">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Apa kamu yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>
</div>

@endsection
