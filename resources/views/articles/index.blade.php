@extends('layout')

@section('content')
<h1 class="mb-4">News Feed</h1>


@foreach($articles as $article)
<div class="card mb-3">
    <div class="card-body">
        <h2 class="card-title">{{ $article->title }}</h2>
        <!-- Display the creation or updated date -->
        <p class="text-muted">
            @if ($article->created_at != $article->updated_at)
            Updated on {{ $article->updated_at->format('d M Y, H:i') }}
            @else
            Created on {{ $article->created_at->format('d M Y, H:i') }}
            @endif
        </p>

        <p class="card-text" id="content-{{ $article->id }}">
            {{ $article->content }}
        </p>


        <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endforeach
<a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Create New Article</a>
@endsection