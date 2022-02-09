<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {   
        return view('posts',[
            'title' => 'All posts',
            // 'posts' => Post::all()
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(40)->withQueryString() // eager loading
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'title' => 'All Post',
            'post' => $post
        ]);
    }
}
