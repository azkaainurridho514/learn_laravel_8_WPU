@extends('layouts.main')

@section('container')

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a class="text-decoration-none btn btn-primary" href="/posts">Back to post</a>
                <h1>{{ $post->title }}</h1>
                <p>By. <a class="text-decoration-none" href="/posts?author={{ $post->user->username }}">{{ $post->user->name }}</a> | <a class="text-decoration-none" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a> | <a class="text-decoration-none" href="/categories">All category</a></p>
                {{-- <h4>{{ $post->excerpt }}</h4> --}}
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">
                <article class="my-5">
                    <p>{!! $post->body !!}</p>
                </article>   
            
            </div>
        </div>
    </div>


@endsection

