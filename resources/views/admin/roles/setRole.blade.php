@extends('layouts.app')
@section('content')<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
           <h1>Assign Role to {{$user->name}}</h1>
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
                <form action="{{url('/users/setRole')}}"  method="POST">
                    @csrf
                    <select name="role_name" class="form-select">
                            @foreach ($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <br>
                        <button type="submit" class="btn btn-success">Assign Role</button>
                    <hr>
                </form>
        </div>
    </div>
@endsection
