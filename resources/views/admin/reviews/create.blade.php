@extends('templates.main')

@section('content')
    <h1>Create Review</h1>

    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Message</label>
            <textarea name="content" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
