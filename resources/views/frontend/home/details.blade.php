@extends('frontend.master')

@section('content')
<div class="col-md-12 mt-2" style="margin-top: -10px;">
    <div class="row">
      <div class="col-md-6">
        <img src="{{ asset('/post/'.$post->image) }}" height="100%" width="100%" />
  </div>
  <div class="col-md-6">
         <p>
              <h1>{{ $post->title }}</h1>
              {{ $post->created_at->diffForHumans() }} | {{ $post->user ? $post->user->name : 'Gust user'}}
        </p>
       <p>{{ $post->description }}</p>
      </div>
    </div>
<textarea class="form-control mt-4" name="message" rows="10" placeholder="Enter your comment"></textarea>
<button type="submit" name="btn" class="btn btn-success mt-2">Send</button>
    </div>
</div>
@endsection