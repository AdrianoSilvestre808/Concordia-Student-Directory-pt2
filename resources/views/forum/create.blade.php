@extends('layouts.app')

@section('content')
<h2>{{ __('messages.create_forum_post') }}</h2>
<form action="{{ route('forum.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>{{ __('messages.title_en') }}:</label>
        <input type="text" name="title_en" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>{{ __('messages.title_fr') }}:</label>
        <input type="text" name="title_fr" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>{{ __('messages.content_en') }}:</label>
        <textarea name="content_en" class="form-control" rows="4" required></textarea>
    </div>
    <div class="mb-3">
        <label>{{ __('messages.content_fr') }}:</label>
        <textarea name="content_fr" class="form-control" rows="4" required></textarea>
    </div>
    <button class="btn btn-success">{{ __('messages.publish') }}</button>
</form>
@endsection