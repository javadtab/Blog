@extends('post::layouts.app')
@section('content')
    <div class="container">
        <div class="titlebar">
 <!--navbar -->
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <h1>Posts list</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('posts.create') }}">Add Post</a>
                            </li>
                        </ul>
                        <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                            @csrf
                            @method ('Delete')
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
<!-- error part -->
        </div>
        <hr>
        <hr>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @foreach ($posts as $post)
            <div class="row" ">
                <div class="col-12">
                    <div class="row">
                        <div class="col-2">
                        </div>
<!-- post box(title,body,img ...) -->
                        <div>
                            <h1>{{ $post->title }}</h1>
                        </div>
                    </div>
                    <div>
                    <p>{{ $post->description }}</p>
                    </div>
                    <img class="img-fluid" style="border-color: red" src="{{ $post->getFirstMediaUrl('images') }}"
                        /width="250px" alt="">
                    <br>
<!--permision part for edit and delete post -->
                    @can('edit' , $post)
                        <a href="{{ url('/posts/' . $post->id . '/edit') }}" class="btn btn-success" role="button">Edit</a>
                    @endcan

                    @can('destroy' , $post )
                        <form method="POST" action="{{ url('/posts/' . $post->id . '/delete') }}">
                            @method('Delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endcan
                    <h6 class="float-end">Written By:{{ $post->user->name }}</h6>
                    <hr>
 <!--comment part -->
                    <h4>Comments</h4>
                    @include('posts.comments', ['comments' => $post->comments, 'post_id' => $post->id])
                    <hr />
                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('comments.store')}}">
                    @csrf
                   <div class="form-group">
                   <textarea class="form-control" name="body"></textarea>
                   <input type="hidden" name="post_id" value="{{ $post->id }}" />
                   </div>
                   <div class="form-group">
                   <input type="submit" class="btn btn-success" value="Add Comment" />
                   </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
