@extends('post::layouts.app')
@section('content')
    <div class="container">
        <section class="mt-3">
            <form method="post" action="/posts" enctype="multipart/form-data">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <h1>Add Post</h1>
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
                                    <a class="nav-link" href="{{ route('posts.index') }}">Posts list</a>
                                </li>
                            </ul>
                            <form action="{{ route('logout') }}" method="post" class="d-flex" role="search">
                                @csrf
                                @method ('Delete')
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                    </div>
                </nav>
                <hr>
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
                @csrf
                <div class="card p-5">
                    <label>Title</label>
                    <input class="form-control" type="text" name="title">
                    <label>Description</label>
                    <textarea class="form-control" type="text" name="description"rows="10"></textarea>
                    <label>Add Image</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <button class="btn btn-secondary m-3">Save</button>
            </form>
        </section>
    </div>
@endsection
