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
        return view('posts.show', ['post'=> $post]);
    }

    public function Create(): View
    {
        return view('posts.create');
    }

    public function Store()
    {
        
        $attributes = request()->validate([
            'title' => 'required | min:3 | max:255',
            'slug' => 'required | min:3 | max:255 | unique:posts,slug',
            'thumbnail' => 'required | image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::Create($attributes);

        return redirect('/');
    }
}
