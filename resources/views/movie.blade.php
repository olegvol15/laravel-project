@extends('templates.main')

@section('content')
    <h1>{{ $movie->title }}</h1>
    <p><strong>Description:</strong> {{ $movie->description }}</p>
    <p><strong>Year:</strong> {{ $movie->year }}</p>
    <p><strong>Category ID:</strong> {{ $movie->category_id }}</p>
    <a href="{{ url()->previous() }}">← Back</a>
@endsection