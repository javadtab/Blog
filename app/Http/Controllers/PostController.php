<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'ASC')->get();
        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user()->id;
       // $post->image = $request->image;

        $post->addMediaFromRequest('image')
                ->toMediaCollection('images');

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.index' , ['post' => $post]);
    }

    public function edit($id )
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request ,  $id)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $post = Post::find($id);
        $post->update($request->all());


        if(Gate::denies('edit' , $post)){
            abort(403);
        };



        if ($request->hasFile('image')){
            $post->clearMediaCollection('images'); #delete


            $post->addMediaFromRequest('image') # new one
            ->toMediaCollection('images');
        }

        return redirect()->route('posts.index')->with('success', 'Post Updated successfully.');
    }


    public function destroy($id)
    {
        $post = Post::find($id);

        if(Gate::denies('destroy' , $post)){
            abort(403);
        };

        $post->delete();
       return redirect()->route('posts.index')->with('success','Post Deleted successfully.');
    }

}






