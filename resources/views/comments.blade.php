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
		</style>
		<div class="row">
            <div class="col-md-8">
                <h1><small class="pull-right">Comments </h1>
               <div class="comments-list">
               		@foreach($comments as $comment)
	                    <div class="media">
		                   	<p class="pull-right"><small>{{ $comment->FriendlyTime}}</small></p>
		                   	<a class="media-left" href="#" style="height: 50px;min-width: 50px;text-align: center;line-height: 50px;border-radius: 50%;color: white;background: gray;font-size: 25px; padding-left: 10px;">{{ $comment->user->name['0'] }}</a>
		                    <div class="media-body" style="width: 100vh; padding-left: 1em;">
		                  		<h4 class="media-heading user_name"> {{ $comment->user->name }} </h4>
		                      	{{ $comment->body}}
		                    </div>
		                </div>
	                @endforeach
               </div>  
            </div>
        </div>
	</div>
@endsection