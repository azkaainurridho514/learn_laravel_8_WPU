@extends('layouts.main')

@section('container')
    <h1>All category</h1>


    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-4">
                <a href="/posts?category={{ $category->slug }}">
                    <div class="card text-white">
                        <img src="https://source.unsplash.com/500x400?{{ $category->name }}" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <p class="card-title fs-3 py-3 flex-fill text-center" style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach 
        </div>
    </div>



    {{-- @foreach ($categories as $category)
        <h2><a href="/category/{{ $category->slug }}">{{ $category->name }}</a></h2>
    @endforeach --}}
@endsection








