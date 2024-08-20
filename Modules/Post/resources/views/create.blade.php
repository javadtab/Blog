
@extends('post::layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <h1>Add Post</h1>
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
                </div>
            </div>
        </nav>
        @csrf
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card p-5">
            <label>Title</label>
            <input class="form-control" type="text" name="title">
            <label>Description</label>
            <textarea class="form-control" type="text" name="description"rows="10"></textarea>
            <label>Add Image</label>
            <input class="form-control" type="file" name="image">
        </div>
       <button type="submit" class="btn btn-secondary m-3">Save</button>
    </form>
</body>
</html>
@endsection
