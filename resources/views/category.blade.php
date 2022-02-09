@extends('layouts.main')

@section('container')
    <h1>Halaman post category {{ $category }}</h1>
    @foreach ($posts as $post)
        <h2><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h2>
        <h4>{{ $post->excerpt }}</h4>
        {{-- <p>{!! $post->body !!}</p> --}}
    @endforeach
@endsection








