@extends('users::layouts.app')
@section('content')
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <h1>Permissions list</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-danger" href="{{ url('./users') }}">Back</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="titlebar">
    <div>
          <div>
                <form method="post" action="/users/updatePermision/{{ $user->id }}">

                    @csrf

                    @foreach ($permissions as $permission)
                        <div>
                            <input
                            @if ($user->hasPermissionTo($permission->name))
                                @checked(true)
                            @endif
                            type="checkbox" name="permissions" value="{{$permission->name}}">  {{$permission->name}}
                        </div>
                    @endforeach
                    <div>
                        <br>
                        <button type="submit" class="btn btn-success">submit</button>
                    </div>
                    <hr>
            </div>
    </div>

@endsection
