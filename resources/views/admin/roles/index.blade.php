@extends('layouts.app')
@section('content')
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <h1>Roles list</h1>
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
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">name</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <a href="{{ route('roles.create') }}" class="btn btn-success" role="button">Create Role</a>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td><a href="{{ url('/roles/' . $role->id .'/edit') }}" class="btn btn-warning" role="button">edit</a></td>
                    <td>
                        <form method="POST" action="{{ url('/roles/delete/' . $role->id) }}">
                            @method('Delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
