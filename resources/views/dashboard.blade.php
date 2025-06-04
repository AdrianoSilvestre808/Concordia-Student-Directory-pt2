@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>{{ __('messages.welcome') }}, {{ Auth::user()->name }}</h2>
        <a href="{{ route('students.index') }}" class="btn btn-primary">{{ __('messages.view_student_list') }}</a>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">{{ __('messages.total_students') }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ \App\Models\Student::count() }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">{{ __('messages.registered_emails') }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ \App\Models\Student::whereNotNull('email')->count() }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">{{ __('messages.cities_represented') }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ \App\Models\Student::distinct('city_id')->count('city_id') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection