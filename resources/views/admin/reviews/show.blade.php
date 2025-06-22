@extends('templates.main')

@section('content')
    <h1>Review by {{ $review->author }}</h1>

    <p><strong>Message:</strong></p>
    <p>{{ $review->message }}</p>

    <a href="{{ route('reviews.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
