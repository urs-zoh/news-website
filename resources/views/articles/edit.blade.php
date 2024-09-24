@extends('layout')

@section('content')
<h1 class="mb-4">Edit Article</h1>

<form action="{{ route('articles.update', $article) }}" method="POST" class="needs-validation" novalidate>
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Article Title</label>
        <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
        <div class="invalid-feedback">
            Please provide a title.
        </div>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea name="content" class="form-control" rows="5" required>{{ $article->content }}</textarea>
        <div class="invalid-feedback">
            Please provide content for the article.
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection