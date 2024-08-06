@extends('layouts.app')
@section('content')
    <div class="container">
        <title>Edit Profile</title>
        <h1>Edit Profile</h1>
        <section class="mt-3">
            <form method="post" action="/profile/update/{{ $user->id }}" enctype="multipart/form-data">
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
                <h1><strong> ▶️Personal information :</strong></h1>
                <hr>
                <div class="card p-3" style="background-color:lightblue ">
                    <label for="floatingInput">Name</label>
                    <input class="form-control" value="{{Auth::user()->name}}" type="text" name="name">
                    <label for="floatingTextArea">IP</label>
                    <input class="form-control" value=" {{Auth::user()->ip}}" type="text" name="ip">
                    <label for="floatingInput">Email</label>
                    <input class="form-control" value="{{Auth::user()->email }}" type="email" name="email">
                    <label for="floatingInput">PhoneNumber</label>
                    <input class="form-control" value="{{Auth::user()->phonenumber}}" type="text" name="phonenumber">
                    <label for="floatingInput">Password</label>
                    <input class="form-control" value="{{Auth::user()->password}}" type="text" name="password">
                    <br>
                    <button type="submit" class="btn btn-success">submit</button>
                </div>

            </form>
        </section>
    </div>
@endsection
