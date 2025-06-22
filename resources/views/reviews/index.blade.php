@extends('templates.main')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center">Залиште свій відгук</h1>

    {{-- Повідомлення про успіх --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('reviews.store') }}" method="POST" class="card shadow-sm p-4">
        @csrf
        <div class="mb-3">
            <label for="author" class="form-label">Ваше ім’я</label>
            <input type="text" name="author" id="author" class="form-control" placeholder="Введіть ваше ім’я" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Ваш відгук</label>
            <textarea name="content" id="content" class="form-control" rows="4" placeholder="Напишіть свій відгук" required></textarea>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Надіслати</button>
        </div>
    </form>

    {{-- Вивід усіх відгуків --}}
    <div class="mt-5">
        <h2 class="mb-3">Всі відгуки</h2>
        @forelse($reviews as $review)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $review->author }}</h5>
                    <p class="card-text">{{ $review->content }}</p>
                    <p class="card-text">
                        <small class="text-muted">{{ $review->created_at->format('d.m.Y H:i') }}</small>
                    </p>
                </div>
            </div>
        @empty
            <p>Відгуків ще немає.</p>
        @endforelse
    </div>
</div>
@endsection
