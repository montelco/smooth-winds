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
                        <table class="table table-hover" id="sortable">
                            <thead>
                                <tr>
                                    <th>Article</th>
                                    <th>Year</th>
                                    <th>Comments</th>
                                    <th>Tags</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($feed->count())
                                    @foreach ($feed as $article)
                                        <tr>
                                            <td>
                                                @if(isset($article->doi))
                                                    <a target="_blank" href="https://rowan.summon.serialssolutions.com/search?ho=t&l=en&q=(DOI:({{$article->doi}}))">{{$article->name}}</a>
                                                @else
                                                    <abbr title="No DOI record to link.">{{$article->name}}</abbr>
                                                @endif
                                            </td>
                                            <td>{{$article->year}}</td>
                                            <td><a href="/comments/{{$article->id}}">{{$article->comments()->count()}} {{str_plural('comment', $article->comments()->count())}}{{-- <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> --}}</a></td>
                                            <td><a href="/categories/{{$article->id}}"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span></a></td>
                                            <td><a href="/discard/{{$article->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        Nothing to show yet. Import an article to get started.
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group flex jc-sa fd-r">
                        @if(Auth::user()->email == "monteleoc8@students.rowan.edu" || Auth::user()->email == "fife@rowan.edu")
                            <a href="{{ url('/categories/editor/list') }}"><div class="btn btn-danger">Admin: Tag Manager</div></a>
                        @endif
                        <a href="/new-entry">
                            <div class="btn btn-default btn-info" id="import">
                                Import An Article
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/css/table.css">
{{-- <script src="js/app.js" defer="false"></script> --}}
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous" defer="false"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endsection