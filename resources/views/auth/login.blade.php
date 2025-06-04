@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 400px">
    <h2 class="mb-4">Student Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
        @endif

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection
