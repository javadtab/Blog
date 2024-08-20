@extends('post::layouts.app')
@section('content')
    <div class="container">
        <h1>Edit post</h1>
        <section class="mt-3">
            <form method="post" action="/posts/update/{{ $post->id }}" enctype="multipart/form-data">
                @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card p-3">
                        <label for="floatingInput">Title</label>
                        <input class="form-control" value="{{ $post->title }}" type="text" name="title">
                        <label for="floatingTextArea">Description</label>
                        <textarea class="form-control" {{ $post->description }} name="description" rows="10" required>{{ $post->description }}</textarea>
                        <label for="formFile" class="form-label">Add Image</label>
                        <input class="form-control" type="file" name="image" value="{{ $post->image }}">
                        <img src="{{ $post->getFirstMediaUrl('images') }}"/width="100px" />
                    </div>
                    <button class="btn btn-secondary m-3">Save</button>
                </form>
        </section>
    </div>
@endsection
