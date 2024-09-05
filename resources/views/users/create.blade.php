@extends('layouts.main')

@section('container')

<h3>Create User</h3>
<form class="form form-horizontal" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="name" name="name" class="form-control" id="name" aria-describedby="nameHelp" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
        @error('password')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <a href="/" type="button" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection
