@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="flex aic jc-sa">
                        <a href="{{ url('/new-entry') }}"><div class="btn btn-success">New Entry</div></a>
                        <a href="{{ url('/view-entries') }}"><div class="btn btn-info">Edit Existing</div></a>
                    @if(Auth::user()->email == "monteleoc8@students.rowan.edu" || Auth::user()->email == "fife@rowan.edu")
                        <a href="{{ url('/categories/editor/list') }}"><div class="btn btn-danger">Admin: Tag Manager</div></a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
