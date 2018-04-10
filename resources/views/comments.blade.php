@extends('layouts.app')

@section('content')
	<div class="container">
		<style>
			.user_name{
			    font-size:14px;
			    font-weight: bold;
			}
			.comments-list .media{
			    border-bottom: 1px dotted #ccc;
			}
			.comments-list>.media {
			    border: solid 1px rgba(0,0,0,0.25);
			    border-radius: 4px;
			    padding: 8px;
			}
			.media-left {
				display: table-cell;
			}
		</style>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
	            <div class="panel panel-default">
	            	<div class="panel-head">
	            		<ul class="breadcrumb">
	                        <li><a href="{{url('/home')}} ">Home</a></li>
	                        <li><a href="{{url('/view-entries')}} ">View Entries</a></li>
	                        <li class="active">Article # {{ $article->id }}</li>
	                        <li class="active">Comments</li>
	                    </ul>
	            	</div>
					<div class="panel-body">
		                
		                <div class="comments-list">
		               		@if($comments->count())
			               		@foreach($comments as $comment)
				                    <div class="media">
					                   	<p class="pull-right"><small>{{ $comment->FriendlyTime}}</small></p>
					                   	<div class="media-left" style="padding-right: 0px;">
					                   		<div style="max-height: 50px;min-width: 50px;text-align: center;line-height: 50px;border-radius: 50%;color: white;background: gray;font-size: 25px;">{{ $comment->user->name['0'] }}</div>
					                   	</div>
					                    <div class="media-body" style="width: 100vh; padding-left: 1em;">
					                  		<h4 class="media-heading user_name"> {{ $comment->user->name }} </h4>
					                      	{{ $comment->body}}
					                    </div>
					                </div>
				                @endforeach
			                @else
			                	<div class="media">
			                		<h1>No comments yet. Make one to get started.</h1>
			                	</div>
		                	@endif
						</div>
						<a id="fieldHidden" onclick="$('#add_comment').toggle();">
	                        <div style="margin-top: 3em;" class="btn btn-success" id="doi-import">
	                            Add Comment
	                        </div>
	                    </a>
						<form id="add_comment" action="/add-comment" method="POST" style="display: none">
	                        <div class="form-group flex fd-r">
	                            {{ csrf_field() }}
	                            <input type="hidden" name="article" value="{{$article->id}}">
	                            <input class="form-control f-o" type="text" name="body" placeholder="Type your comment..." aria-label="Comment body"/>
	                            <input type="submit" class="btn btn-success" value="Post">
	                        </div>
	                    </form>
	               </div>  
	            </div>
            </div>
        </div>
	</div>
@endsection