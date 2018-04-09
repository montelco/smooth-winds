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
                        {{-- <div class="form-group flex jc-sa fd-r">
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
                        </form> --}}
                        <table class="table table-hover" id="sortable">
                            <thead>
                                <tr>
                                    <th>Article</th>
                                    <th>Journal</th>
                                    <th>Pages</th>
                                    <th>Year</th>
                                    <th>DOI</th>
                                    <th>Comments</th>
                                    <th>Categories</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($feed->count())
                                    @foreach ($feed as $article)
                                        <tr>
                                            <td>{{$article->name}}</td>
                                            <td>{{$article->journal}}</td>
                                            <td>{{$article->page}}</td>
                                            <td>{{$article->year}}</td>
                                            <td>{{$article->doi}}</td>
                                            <td><a href="/comments/{{$article->id}}"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></a></td>
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
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/app.js" defer="false"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous" defer="false"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endsection