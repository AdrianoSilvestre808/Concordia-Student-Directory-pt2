@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ __('messages.forum') }}</h2>
    
    @if(session('locale_debug'))
        <div class="alert alert-info">
            Current Locale: {{ app()->getLocale() }} | 
            Session Locale: {{ session('locale') }}
        </div>
    @endif

    <a href="{{ route('forum.create') }}" class="btn btn-primary mb-3">{{ __('messages.new_post') }}</a>

    @foreach($posts as $post)
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ route('forum.show', $post) }}">
                        {{ $post->{'title_'.app()->getLocale()} }}
                    </a>
                </h4>
                <p class="card-text">{{ $post->{'content_'.app()->getLocale()} }}</p>
                <p class="text-muted small">
                    {{ __('messages.posted_by') }}: {{ $post->user->name }} |
                    {{ __('messages.published') }}: {{ $post->created_at->format('M d, Y H:i') }}
                </p>

                @if($post->user_id === auth()->id())
                    <div class="mt-3">
                        <a href="{{ route('forum.edit', $post) }}" class="btn btn-sm btn-warning">
                            {{ __('messages.edit') }}
                        </a>
                        <form action="{{ route('forum.destroy', $post) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                onclick="return confirm('{{ __('messages.confirm_delete') }}')">
                                {{ __('messages.delete') }}
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection