@extends('layout')

@section('content')
<h1 class="mb-4">Create New Article</h1>

<form action="{{ route('articles.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Article Title</label>
        <input type="text" name="title" class="form-control" placeholder="Article Title" required>
        <div class="invalid-feedback">
            Please provide a title.
        </div>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea name="content" class="form-control" placeholder="Content" rows="5" required></textarea>
        <div class="invalid-feedback">
            Please provide content for the article.
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection