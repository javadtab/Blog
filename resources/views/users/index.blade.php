@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="titlebar">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <h1>User List</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link btn-dark" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                        </ul>
                        <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                            @csrf
                            @method ('Delete')
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
            <div>
                @can('read user')
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><a href="{{ url('/users/' . $user->id ) }}" class="btn btn-primary"
                                        role="button">View</a>
                                    </td>
                                    <td><a href="{{ url('/users/' . $user->id . '/permision') }}" class="btn btn-warning"
                                            role="button">Permisions</a>
                                    </td>
                                    <td><a href="{{ url('/users.admin/' . $user->id . '/edit') }}" class="btn btn-success"
                                            role="button">Edit Pass</a>
                                    </td>
                                    @can('delete user')
                                     <td><form method="POST" action="{{ url('/users/' . $user->id . '/delete') }}">
                                            @method('Delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                     </td>
                                    @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endcan
            @endsection
