@extends('layouts.public')

@section('main')
    <div class="title m-b-md">
        Smooth Winds
        <span class="text-muted">A Database Application for <strong>Rowan</strong> Research</span>
    </div>
        @auth
            <a href="{{ url('/home') }}"><div class="btn btn-success">Dashboard Home</div></a>
        @else
            <a href="{{ url('/login') }}"><div class="btn btn-primary">Login</div></a>
        @endauth
@endsection