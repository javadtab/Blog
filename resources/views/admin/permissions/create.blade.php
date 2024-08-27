@extends('layouts.app')
@section('content')
<form action="{{ route('permissions.store') }}" method="POST" enctype="multipart/form-data">
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
    <input class="form-control" type="text" name="permission">
</div>
<button type="submit" class="btn btn-secondary m-3">Save</button>
</form>
@endsection
