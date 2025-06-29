@extends('templates.main')

@section('content')
    <h1>Categories</h1>
    <ul>
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('category.show', $category->id) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection