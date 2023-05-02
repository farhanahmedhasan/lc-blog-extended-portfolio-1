<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cookie;
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
        if(!Cookie::get($post->id)){
            Cookie::queue($post->id, 1, 120);
            $post->incrementViewCount();
        }

        return view('posts.show', ['post'=> $post]);
    }
}
