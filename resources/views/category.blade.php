@extends('templates.main')

@section('content')
    <h1>Movies in "{{ $category->name }}"</h1>
    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach ($movies as $movie)
            <div style="border: 1px solid #ccc; padding: 10px; width: 200px;">
                <h3>{{ $movie->title }}</h3>
                <p>{{ Str::limit($movie->description, 100) }}</p>
                <a href="{{ route('movie.show', $movie->id) }}">Read more</a>
            </div>
        @endforeach
    </div>
@endsection
