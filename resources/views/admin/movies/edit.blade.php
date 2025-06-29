@extends('templates.main')

@section('content')
    <h1>Edit Movie</h1>

    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $movie->title) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $movie->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Actors</label>
            <select name="actors[]" multiple class="form-control">
                @foreach ($actors as $actor)
                    <option value="{{ $actor->id }}" {{ $movie->actors->contains($actor->id) ? 'selected' : '' }}>
                        {{ $actor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Image</label>
            @if($movie->image)
                <div>
                    <img src="{{ asset('storage/' . $movie->image) }}" width="120">
                </div>
            @endif
            <input type="file" name="image" class="form-control mt-2">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
