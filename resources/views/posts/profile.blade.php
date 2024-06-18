@extends('layouts.app')
@section('content')



<hr>
<h2>{{ Auth::user()->name }} </h2>
<h2>{{ Auth::user()->email }} </h2>
<h2>{{ Auth::user()->phonenumber }} </h2>


























@endsection
