<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("created_at", "desc")->paginate(10);
        return view("posts.index", compact("posts"));
    }
    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required", "string"],
            "content" => ["required", "string"],
            "image" => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }
        $post = Post::create([
            "title" => $request->title,
            "content" => $request->content,
            "image" => $imagePath,
        ]);
        return redirect()->route("posts.index", $post->id)->with("success", "Post Created");
    }
    public function show(Post $post)
    {
      
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

     
        if ($request->hasFile('image')) {
      
            if ($post->image) {
                Storage::delete('public/' . $post->image);
            }

            $imagePath = $request->file('image')->store('uploads', 'public');
            $post->image = $imagePath;
        }

    
        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
