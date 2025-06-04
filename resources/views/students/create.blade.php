@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h2>{{ __('messages.add_student') }}</h2>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>{{ __('messages.whoops') }}</strong> {{ __('messages.fix_errors') }}:
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">{{ __('messages.full_name') }}</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('messages.email') }}</label>
                <input type="email" name="email" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.address') }}</label>
            <input type="text" name="address" class="form-control" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">{{ __('messages.phone') }}</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('messages.date_of_birth') }}</label>
                <input type="date" name="date_of_birth" class="form-control" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label">{{ __('messages.city') }}</label>
            <select name="city_id" class="form-select" required>
                <option value="">{{ __('messages.select_city') }}</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">{{ __('messages.submit') }}</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
    </form>
@endsection