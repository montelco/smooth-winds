@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="breadcrumb">
                        <li><a href="{{url('/home')}} ">Home</a></li>
                        <li class="active">New Entry</li>
                    </ul>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissable show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="flex fd-c">
                        <div class="jcc">
                            <h2>Create a New Entry</h2>
                        </div>
                        <div class="form-group flex jc-sa fd-r">
                            <a id="fieldHidden" onclick="$('#doi_field').toggle();">
                                <div class="btn btn-info" id="doi-import">
                                    DOI Import
                                </div>
                            </a>
                            <div class="btn btn-default" id="manual">
                                Create Manually
                            </div>
                        </div>
                        <form id="doi_field" action="/search" method="POST" style="display: none">
                            <div class="form-group flex fd-r">
                                {{ csrf_field() }}
                                <input class="form-control f-o" type="text" name="doi_val" placeholder="10.1016/j.psych.2018.01.01" aria-label="DOI Field"/>
                                <input type="submit" class="btn btn-success" value="Import the Article">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection