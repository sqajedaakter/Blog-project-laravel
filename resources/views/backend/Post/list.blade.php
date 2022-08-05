@extends('backend.master')


@section('content')


    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Post list
    </div>
    <div class="card-body">
        @if (session()->has('success'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session()->get('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Category name</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ ucfirst($post->category? $post->category->name : '') }}</td>
                    <td>{{ ucfirst($post->title) }}</td>
                    <td>
                     <img src="{{ asset('/post/'.$post->image) }}" height="100" width="150"/>   
                    </td>
                    <td>
                        <a href="{{ url('/edit/post/' .$post->id) }}"  class="btn  btn-sm btn-info">Edit</a>
                        <a href="{{ url('/delete/post/' .$post->id) }}" onclick="return confirm('Are you sure delete this info ?')" class="btn  btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>


@endsection