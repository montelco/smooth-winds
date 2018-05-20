@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="breadcrumb">
                        <li><a href="{{url('/home')}}">Home</a></li>
                        <li><a href="{{url('/view-entries')}}">View Entries</a></li>
                        <li class="active">Tags: {{$article['0']->name}}</li>
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
                            <h2>Tags for <small>{{$article['0']->name}}</small></h2>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-4" id="purpose">
                                <h4>Purpose</h4>
                                <form id="article_categories_0" class="col-xs-12 col-md-12" action="/categories" method="POST">
                                    <div class="form-group">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="type" value="0">
                                        <input type="hidden" name="article" value="{{$article['0']->id}}">
                                        @foreach($all_tags[0] as $tag)
                                            @if(in_array($tag, $tags->toArray()))
                                                <div class="no-bm">
                                                    <input type="checkbox" name="name[]" value="{{$tag}}" checked><label class= "list" for="name[{{$tag}}]">{{$tag}}</label>
                                                </div>
                                            @else
                                                <div class="no-bm">
                                                    <input class="list" type="checkbox" name="name[]" value="{{$tag}}"><label class= "list" for="name[{{$tag}}]">{{$tag}}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                        <input type="submit" class="btn btn-success" value="Add Tags">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4" id="problems">
                                <h4>Problems/Strengths of NHST</h4>
                                <form id="article_categories_1" class="col-xs-12 col-md-12" action="/categories" method="POST">
                                    <div class="form-group flex fd-r">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="type" value="1">
                                        <input type="hidden" name="article" value="{{$article['0']->id}}">
                                        <input type="select" id="taggable2" placeholder="Select problems/strengths.">
                                        <input type="submit" class="btn btn-success" value="Add Tags">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4" id="alternatives">
                                <h4>Alternatives</h4>
                                <form id="article_categories_2" class="col-xs-12 col-md-12" action="/categories" method="POST">
                                    <div class="form-group flex fd-r">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="type" value="2">
                                        <input type="hidden" name="article" value="{{$article['0']->id}}">
                                        <input type="select" id="taggable3" placeholder="Select alternatives.">
                                        <input type="submit" class="btn btn-success" value="Add Tags">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" id="evidence">
                                <h4>Evidence</h4>
                                <form id="article_categories_3" class="col-xs-12 col-md-12" action="/categories" method="POST">
                                    <div class="form-group flex fd-r">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="type" value="3">
                                        <input type="hidden" name="article" value="{{$article['0']->id}}">
                                        <input type="select" id="taggable4" placeholder="Select evidence.">
                                        <input type="submit" class="btn btn-success" value="Add Tags">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4" id="future">
                                <h4>Future Direction, Implementation, or Resources Needed</h4>
                                <form id="article_categories_4" class="col-xs-12 col-md-12" action="/categories" method="POST">
                                    <div class="form-group flex fd-r">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="type" value="4">
                                        <input type="hidden" name="article" value="{{$article['0']->id}}">
                                        <input type="select" id="taggable5" placeholder="Select future directions.">
                                        <input type="submit" class="btn btn-success" value="Add Tags">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if($tags->count())
                        @foreach ($tags as $tag)
                            <span style="flex: 0; display: inline-block; background: rgba(0,0,0,0.8); color: white; border-radius: 2px; padding: 6px;">{{$tag}}</span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
