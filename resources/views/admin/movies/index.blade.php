@extends('templates.main')

@section('content')
    <h1>Movies</h1>

    <a href="{{ route('movies.create') }}" class="btn btn-primary my-3">Create Movie</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Actors</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($movie->image)
                            <img src="{{ asset('storage/' . $movie->image) }}" alt="{{ $movie->title }}" width="100">
                        @else
                            <img src="{{ asset('images/no-image.jpeg') }}" alt="{{ $movie->title }}" width="100">
                        @endif
                    </td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->category?->name }}</td>
                    <td>
                        @foreach ($movie->actors as $actor)
                            <span class="badge bg-secondary">{{ $actor->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
