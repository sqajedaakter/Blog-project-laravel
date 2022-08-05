@extends('frontend.master')

@section('content')

<div class="row">
    <!-- Blog entries-->
    <div class="col-lg-8">
        <!-- Featured blog post-->
        <div class="card mb-4">
            <div class="card-body">
                <div class="small text-muted">January 1, 2022</div>
                <h2 class="card-title">Featured Post Title</h2>
                <a href="#!"><img class="card-img-top" src="{{ asset('/post/1658685438.jpg') }}" alt="..." /></a>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                <a class="btn btn-primary" href="#!">Read more →</a>
            </div>
        </div>
        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-6">
                <!-- Blog post-->
                <div class="card mb-4">
                    <a href="{{ url('/blog/details/'.$post->id.'/'.str_replace(' ','-',strtolower($post->title))) }}"><img class="card-img-top" src="{{ asset('/post/'.$post->image) }}" alt="..." style="height: 284px" /></a>
                    <div class="card-body">
                        <div class="small text-muted">January 1, 2022</div>
                        <h2 class="card-title h4">{{ $post->title }}</h2>
                        <p class="card-text">{{ $post->description }}.</p>
                        <a class="btn btn-primary" href="{{ url('/blog/details/'.$post->id.'/'.str_replace(' ','-',strtolower($post->title))) }}">Read more →</a>
                    </div>
                </div>
                <!-- Blog post-->
            </div>
            @endforeach
        </div>
        <!-- Pagination-->
       {{ $posts->links() }}
    </div>
    <!-- Side widgets-->
    <div class="col-lg-4">
        <!-- Search widget-->
        <div class="card mb-4">
            <div class="card-header">Search</div>
            <div class="card-body">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                    <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                </div>
            </div>
        </div>
        <!-- Categories widget-->
        <div class="card mb-4">
            <div class="card-header">Categories</div>
            <div class="card-body">
                <div class="row">
              @foreach($categories as $category)
              <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    <li><a href="{{ url('/category/post/'.$category->id) }}">{{ $category->name }}</a></li>
                </ul>
            </div>
              @endforeach
                </div>
            </div>
        </div>
        <!-- Side widget-->
        <div class="card mb-4">
            <div class="card-header">Side Widget</div>
            <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
        </div>
    </div>
</div>


@endsection