@extends('templates.main')

@section('content')
    <h1>Admin – Reviews</h1>

    <a href="{{ route('reviews.create') }}" class="btn btn-primary my-3">Create Review</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Author</th>
                <th>Content</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $review->author }}</td>
                    <td>{{ $review->content }}</td>
                    <td>{{ $review->created_at->format('d.m.Y') }}</td>
                    <td>
                        <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

