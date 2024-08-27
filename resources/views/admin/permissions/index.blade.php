@extends('layouts.app')
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
<h1>Premissins list</h1>
<hr>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">name</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"><a href="{{ route('permissions.create') }}" class="btn btn-success" role="button">Create Permission</a></th>
         </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td><a href="{{ url('permissions/' . $permission->id .'/edit') }}" class="btn btn-warning"role="button">edit</a></td>
                <td>
                    <form method="POST" action="{{ url('permissions/delete/' . $permission->id) }}">
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
