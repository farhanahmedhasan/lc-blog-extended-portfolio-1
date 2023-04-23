<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Storage;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index',[
            'posts' => Post::latest()->paginate(20)
        ]);
    }

    public function Create(): View{
        return view('admin.posts.create');
    }

    public function Store(){
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

    public function edit(Post $post){
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post){
        $attributes = request()->validate([
            'title' => 'required | min:3 | max:255',
            'slug' => ['required', 'min:3', 'max:255', Rule::unique('posts', 'slug')->ignore($post->id)],
            'thumbnail' => ' image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        if(isset($attributes['thumbnail'])){
            Storage::delete($post->thumbnail);
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post){
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }
}
