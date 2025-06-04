@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>{{ app()->getLocale() == 'fr' ? $forum->title_fr : $forum->title_en }}</h2>
            <small class="text-muted">
                {{ __('messages.posted_by') }}: {{ $forum->user->name }} | 
                {{ __('messages.published') }}: {{ $forum->created_at->format('M d, Y H:i') }}
            </small>
        </div>
        <div class="card-body">
            <p>{{ app()->getLocale() == 'fr' ? $forum->content_fr : $forum->content_en }}</p>
        </div>
        <div class="card-footer">
            @if($forum->user_id == auth()->id())
                <a href="{{ route('forum.edit', $forum) }}" class="btn btn-warning">
                    {{ __('messages.edit') }}
                </a>
                <form action="{{ route('forum.destroy', $forum) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" 
                        onclick="return confirm('{{ __('messages.confirm_delete') }}')">
                        {{ __('messages.delete') }}
                    </button>
                </form>
            @endif
            <a href="{{ route('forum.index') }}" class="btn btn-secondary float-end">
                {{ __('messages.back_to_forum') }}
            </a>
        </div>
    </div>
</div>
@endsection