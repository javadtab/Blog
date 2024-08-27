@extends('layouts.app')
@section('content')
    <form action="/permissions/update/{{ $permission->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card p-5">
            <label>Permission</label>
            <input class="form-control" type="text" name="name" value="{{$permission->name}}">
        </div>
        <button type="submit" class="btn btn-secondary m-3">Update</button>
    </form>
@endsection
