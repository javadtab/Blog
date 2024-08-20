
@extends('post::layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>Add Post</h1>
</head>
<body>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
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
