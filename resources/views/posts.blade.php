@extends('layouts.main')
@section('container')

<h1 class="mb-3 text-center">{{ $title }}</h1>

  <div class="container">
    <div class="row mb-5 justify-content-center">
      <div class="col-md-8">
        <form action="">
          @if (request('category'))
              <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          @if (request('author'))
              <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search your dreams" name="search" value="{{ request('search') }}">
            <button class="btn text-white" style="background-color:rgba(0, 189, 41, 0.534)" type="submit">Search</button>
          </div>
        </form>
      </div>
    </div>
  </div>



 @if ($posts->count())  {{-- count adalah function untuk melihat apakah ada isinya   --}}
  <div class="card mb-3 text-center">
    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $posts[0]->title }}</h5>
      <p>By. <a href="/posts?author={{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> | <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> | <a href="/categories" class="text-decoration-none">All category</a> | <small class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small> </p> 
      <p class="card-text">{{ $posts[0]->excerpt }}</p>
      <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn bg-success text-light">Read More...</a>
    </div>
  </div>
  
  <div class="container">
    <div class="row">
      @foreach ($posts->skip(1) as $post)
      <div class="col-md-4 mb-3">
        <div class="card">
            <div class="position-absolute py-1 px-2 text-light" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <p>By. <a href="/posts?author={{ $post->user->username }}">{{ $post->user->name }}</a> | <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                <p class="card-text">{{ $post->excerpt }}.</p>
                <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More...</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="container d-flex justify-content-center">
      {{ $posts->links() }}
    </div>
    
    @else
    <p class="text-center fs-4">No post found.</p>
    @endif

    {{-- @foreach ($posts->skip(1) as $post)
    <article class="mb-3 border-bottom pb-2">
        <h1><a href="/post/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h1>
        <p>By. <a href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a> | <a href="/category/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> | <a href="/categories" class="text-decoration-none">All category</a></p>
        <h4>{{ $post->excerpt }}</h4>
        <a href="/post/{{ $post->slug }}" class="text-decoration-none">Read More...</a>
    </article>
    @endforeach --}}
@endsection








