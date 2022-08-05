@extends('backend.master')

@section('content')
<div class="container-fluid px-4">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ url('/post/update/'.$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 mt-4">
            @if (session()->has('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session()->get('success') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Update Post</div>
                        <div class="card-body">
                            <label>Category name</label>
                           <select class="form-control" name="category_id">
                            <option>Select a category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
        
                           </select>
                           <label>Title</label>
                           <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Post title" />
                           <label>Description</label>
                           <textarea class="form-control" rows="8" name="description" placeholder="Post description">{{ $post->description }}</textarea>
                           <label>Image</label>
                           <input type="file" name="image" class="form-control" />
                           <img src="{{ asset('/post/'.$post->image) }}" height="100" width="100"/><br/>
                            <button type="submit" name="btn" class="btn btn-success mt-3">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </form>
</div>
@endsection