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

        Post::Create(array_merge($this->validatePost(), [
            'user_id' => auth()->id(),
            'thumbnail' =>request()->file('thumbnail')->store('thumbnails')
        ]));

        return redirect('/');
    }

    public function edit(Post $post){
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post){
        $attributes = $this->validatePost($post);

        if(isset($attributes['thumbnail'])){
            Storage::delete($post->thumbnail);
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post){
        if(isset($attributes['thumbnail'])){
            Storage::delete($post->thumbnail);
        }
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

    protected function validatePost(?Post $post = null){

        $post ??= new Post();

        return request()->validate([
            'title' => 'required | min:3 | max:255',
            'slug' => ['required', 'min:3', 'max:255', Rule::unique('posts', 'slug')->ignore($post)],
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', 'exists:categories,id'],
        ]);
    }
}
