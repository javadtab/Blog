@extends('post::layouts.app')
@section('content')
    <div class="container">
        <div class="titlebar">
        @endsection

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
                            <a class="nav-link" href="{{ route('dashboard') }}">🟠Dashboard</a>
                        </li>
                        @can('create post')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.create') }}">➕Add Post</a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </nav>
        <hr>
        <hr>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @foreach ($posts as $post)
            <table class="table m-4 p-2">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">image</th>
                        <th scope="col">Writen By</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td><img class="img-fluid" style="border-color: red"
                                    src="{{ $post->getFirstMediaUrl('images') }}" /width="80px" alt=""></td>
                            <td>{{ $post->user->name }}</td>
                            <td> @can ('edit', $post)<a href="{{ url('/posts/' . $post->id . '/edit') }}" class="btn btn-success"
                                    role="button">Edit</a>
                                    @endcan</td>
                            <td> @can('destroy', $post)
                                    <form method="POST" action="{{ url('/posts/' . $post->id . '/delete') }}">
                                        @method('Delete')
                                        @csrf
                                        <button type="submit"class="btn btn-danger">Delete</button>
                                    </form>
                                @endcan
                            </td>
                            <td>                <form method="post" action="{{ route('comments.store') }}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="body"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Add Comment" />
                                </div>
                            </form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
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
                        <h4>{{ $post->description }}</h4>
                        </div>
                        <img class="img-fluid" style="border-color: red" src="{{ $post->getFirstMediaUrl('images') }}"
                            /width="150px" alt="">
                        <br>
    <!--permision part for edit and delete post -->
                        @can('edit', $post)
                        <a href="{{ url('/posts/' . $post->id . '/edit') }}" class="btn btn-success" role="button">Edit</a>
                        @endcan

                        @can('destroy', $post)
                         <form method="POST" action="{{ url('/posts/' . $post->id . '/delete') }}">
                         @method('Delete')
                         @csrf
                         <button type="submit"class=" btn btn-danger">Delete</button></form>
                        @endcan

                <h6 class="">Written By : {{ $post->user->name }}</h6>
                <hr>
                <!--comment part -->
                <h4>Comments</h4>
                @include('post::comments', [
                    'comments' => $post->comments,
                    'post_id' => $post->id,
                ])
                <hr />
                <h4>Add comment</h4>
                <form method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Add Comment" />
                    </div>
                </form>
                    <hr>
            </div>
    </div>
    @endforeach
