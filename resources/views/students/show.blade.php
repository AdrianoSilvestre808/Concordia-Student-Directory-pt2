@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h2>{{ __('messages.student_profile') }}</h2>
    </div>

    <div class="card shadow-sm bg-white">
        <div class="card-body">
            <h5 class="card-title">{{ $student->name }}</h5>
            <p class="card-text"><strong>{{ __('messages.email') }}:</strong> {{ $student->email }}</p>
            <p class="card-text"><strong>{{ __('messages.address') }}:</strong> {{ $student->address }}</p>
            <p class="card-text"><strong>{{ __('messages.phone') }}:</strong> {{ $student->phone }}</p>
            <p class="card-text"><strong>{{ __('messages.date_of_birth') }}:</strong> {{ \Carbon\Carbon::parse($student->date_of_birth)->format('Y-m-d') }}</p>
            <p class="card-text"><strong>{{ __('messages.city') }}:</strong> {{ $student->city->name }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('students.index') }}" class="btn btn-secondary">{{ __('messages.back_to_list') }}</a>
            <div>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">{{ __('messages.edit') }}</a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('{{ __('messages.confirm_delete') }}')">{{ __('messages.delete') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection