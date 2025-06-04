@extends('layouts.app')

@section('content')
<h2>{{ __('messages.edit_forum_post') }}</h2>

<form action="{{ route('forum.update', $forum->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>{{ __('messages.title_en') }}:</label>
        <input type="text" name="title_en" class="form-control" value="{{ $forum->title_en }}" required>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.title_fr') }}:</label>
        <input type="text" name="title_fr" class="form-control" value="{{ $forum->title_fr }}" required>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.content_en') }}:</label>
        <textarea name="content_en" class="form-control" rows="4" required>{{ $forum->content_en }}</textarea>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.content_fr') }}:</label>
        <textarea name="content_fr" class="form-control" rows="4" required>{{ $forum->content_fr }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">{{ __('messages.update') }}</button>
</form>
@endsection