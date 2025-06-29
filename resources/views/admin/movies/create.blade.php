
@extends('templates.main')

@section('content')
<h1>Create Movie</h1>

<form method="POST" action="{{ route('admin.movies.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control" required>
          <option value="">Select a category</option>
          @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
      </select>
      
    </div>

    <div class="form-group">
      <label>Actors</label><br>
      @foreach ($actors as $actor)
          <div class="form-check">
              <input class="form-check-input" type="checkbox" name="actors[]" value="{{ $actor->id }}" id="actor{{ $actor->id }}">
              <label class="form-check-label" for="actor{{ $actor->id }}">
                  {{ $actor->name }}
              </label>
          </div>
      @endforeach
  </div>
  
  

    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Create</button>
</form>
@endsection
