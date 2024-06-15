@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="titlebar">
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
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>

        </div>
        <hr>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @foreach ($posts as $post)
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-2">
                        </div>
                        <div>
                            <h3>{{ $post->title }}</h3>
                        </div>
                    </div>
                    <p>{{ $post->description }}</p>

                    <img class="img-fluid" style="max-width:50%;" src="{{ $post->getFirstMediaUrl('images') }}"
                        /width="150px" alt="">
                    <br>
                    <h6 class="float-end">Written By:{{ $post->user->name }}</h6>

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
                    <hr>
                    <hr>
                </div>
            </div>
        @endforeach
    </div>
@endsection
