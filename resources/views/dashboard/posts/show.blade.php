@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1>{{ $post->title }}</h1>
            <a href="/dashboard/posts" class="text-decoration-none badge bg-primary mb-2"><span data-feather="arrow-left"></span>Back to all my posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-decoration-none badge bg-warning mb-2"><span data-feather="edit"></span>Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button class="badge mb-2 bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>Hapus</button>
              </form>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" style="width: 1200px" class="img-fluid" alt="">
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">
            @endif

            <article class="my-5">
                <p>{!! $post->body !!}</p>
            </article>   
        
        </div>
    </div>
</div>
@endsection