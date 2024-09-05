@extends('layouts.main')

@section('container')

<h3>Update User</h3>
<form class="form form-horizontal" method="POST" action="{{ route('users.update', $users->id) }}"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="name" name="name" class="form-control" id="name" value="{{ $users->name }}"
            aria-describedby="nameHelp">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ $users->email }}"
            aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" value="{{ $users->password }}">
        @error('password')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <a href="/" type="button" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection
