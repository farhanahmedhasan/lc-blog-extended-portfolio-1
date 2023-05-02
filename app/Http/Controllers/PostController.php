<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{

    public function index() : view
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category' , 'author']))->paginate(20)->withQueryString(),
        ]);
    }

    public function show(Post $post): View
    {
        $post->incrementViewCount();
        return view('posts.show', ['post'=> $post]);
    }
}
