
@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('profile')}}"><strong>{{ Auth::user()->name }}</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    </nav>
    <div class="container">
        <h1><strong>Home Page</strong></h1>
        <hr>
        <a  href="{{ route('posts.index') }}">Posts list</a>
        <hr>
        <a  href="{{ route('posts.create') }}">Create post</a>
        <hr>
        @can('read user')
         <a  href= "{{ route('users')}}">Users</a>
        @endcan
        <hr>

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


        <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
            @csrf
            @method ('Delete')
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>
@endsection
