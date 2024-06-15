<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return Post::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $post = Post::create($request->all());

        if ($request->hasFile('image')){
            $post->clearMediaCollection('images');


            $post->addMediaFromRequest('image')
            ->toMediaCollection('images');
        }

        return response()->json($post, 201);
    }
    public function show(Post $post)
    {
        return response()->json($post);
    }
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

        return response()->json($post);
    }
    public function destroy( Post $post)
    {
        $post->delete();

        return response()->json(null, 204);
    }
}
