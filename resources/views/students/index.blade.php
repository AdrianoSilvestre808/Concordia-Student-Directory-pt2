@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>{{ __('messages.student_list') }}</h2>
        <a href="{{ route('students.create') }}" class="btn btn-primary">+ {{ __('messages.add_student') }}</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover bg-white shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>{{ __('messages.name') }}</th>
                    <th>{{ __('messages.email') }}</th>
                    <th>{{ __('messages.city') }}</th>
                    <th>{{ __('messages.date_of_birth') }}</th>
                    <th class="text-center">{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->city->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($student->date_of_birth)->format('Y-m-d') }}</td>
                    <td class="text-center">
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-info">{{ __('messages.view') }}</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">{{ __('messages.edit') }}</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('{{ __('messages.confirm_delete') }}')">{{ __('messages.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">{{ __('messages.no_students') }}</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection