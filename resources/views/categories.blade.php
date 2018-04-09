@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="breadcrumb">
                        <li><a href="{{url('/home')}} ">Home</a></li>
                        <li class="active">View Entries</li>
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
                            <h2>Viewing All Entries</h2>
                        </div>
                        <div class="row">
                            <form id="article_categories_1" class="col-xs12 col-md-4" action="/categories" method="POST">
                            <div class="form-group flex fd-r">
                                {{ csrf_field() }}
                                <input type="hidden" name="type" value="1">
                                <input type="hidden" name="article" value="{{$article_id->id}}">
                                <input type="select" id="taggable" name="taggable" placeholder="Select categories or enter new one...">
                                <input type="submit" class="btn btn-success" value="Add Tags">
                            </div>
                            </form>
                            <form id="article_categories_2" class="col-xs-12 col-md-4" action="/categories" method="POST">
                                <div class="form-group flex fd-r">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="manual" value="2">
                                    <input type="hidden" name="article" value="{{$article_id->id}}">
                                    <input type="select" id="taggable" placeholder="Select categories or enter new one...">
                                    <input type="submit" class="btn btn-success" value="Add Tags">
                                </div>
                            </form>
                            <form id="article_categories_3" class="col-xs-12 col-md-4" action="/categories" method="POST">
                                <div class="form-group flex fd-r">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="manual" value="3">
                                    <input type="hidden" name="article" value="{{$article_id->id}}">
                                    <input type="select" id="taggable" placeholder="Select categories or enter new one...">
                                    <input type="submit" class="btn btn-success" value="Add Tags">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
