@extends('layouts.app')
@section('content')
    <div class="container">
        <title></title>
        <section class="mt-3">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <h1>Edit Profile</h1>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="btn btn-danger" href="{{ route('users') }}">Back</a>
                                </li>
                        </div>
                    </div>
                </nav>
                <hr>
                <form method="post" action="/users/update/{{ $user->id }}" enctype="multipart/form-data">
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
                    <label for="floatingInput">Password</label>
                    <input class="form-control" value="{{Auth::user()->password}}" type="text" name="password">
                    <br>
                </div>
                    <button class="btn btn-success">submit</button>

            </form>
        </section>
    </div>
@endsection
