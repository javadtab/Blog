@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Add Post</h1>
        <section class="mt-3">
            <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <ul>{{ $error }}</ul>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card p-5">
                    <label >Title</label>
                    <input class="form-control" type="text" name="title">
                    <label >Description</label>
                    <textarea class="form-control" name="description"rows="20"></textarea>
                    <label >Add Image</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <button class="btn btn-secondary m-3">Save</button>
            </form>
        </section>
    </div>
@endsection
