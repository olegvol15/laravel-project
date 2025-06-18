@extends ('templates.main');

@section('content')
    <h1>Create Category</h1>

    <form action="{{route('categories.store')}}" method="POST">
      @csrf
      <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input type="text" class="form-control" id="description" name="description">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
        