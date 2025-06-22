@extends('templates.main')

@section('content')
    <h1>Edit Review</h1>

    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" value="{{ $review->author }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Message</label>
            <textarea name="content" class="form-control" rows="4" required>{{ $review->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

