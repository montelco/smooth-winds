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
                            <a href="{{ url('/view-entries') }}"><div class="btn btn-info">Edit Existing Article</div></a>
                        </div>
                    @endif
                    @if ($errors->first('doi_val'))
                        <div class="alert alert-danger alert-dismissable show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $errors->first('doi_val') }}
                        </div>
                    @endif
                    <div class="flex fd-c">
                        <div class="jcc">
                            <h2>Create a New Entry</h2>
                        </div>
                        <div class="jcc">
                            <a href="{{ url('/doi') }}"><div class="btn btn-success">Prefill Using DOI Info</div></a>
                        </div>
                        @if(isset($prefill))
							<form id="manual_field" action="/search" method="POST">
							    <div class="form-group flex fd-c">
							        {{ csrf_field() }}
							        <input type="hidden" name="manual" value="1">
							        <label for="doi_val">DOI</label>
							        @if(isset($prefill['message']['DOI']))
							        <input class="form-control f-o" type="text" name="doi_val" value="{{$prefill['message']['DOI']}}" placeholder="10.1016/j.psych.2018.01.01" aria-label="DOI Field"/>
							        @else
							        <input class="form-control f-o" type="text" name="doi_val" placeholder="10.1016/j.psych.2018.01.01" aria-label="DOI Field"/>
							        @endif
							        <label for="name">Title</label>
							        @if(isset($prefill['message']['title']['0']))
							        <input class="form-control f-o" type="text" name="name" value="{{$prefill['message']['title']['0']}}" placeholder="Effects of Psychology Research on Quidditch Players" aria-label="Article Title"/>
							        @else
							        <input class="form-control f-o" type="text" name="name" placeholder="Effects of Psychology Research on Quidditch Players" aria-label="Article Title"/>
							        @endif
							        <label for="journal">Journal</label>
							        @if(isset($prefill['message']['container-title']['0']))
							        <input class="form-control f-o" type="text" name="journal" value="{{$prefill['message']['container-title']['0']}}" placeholder="Journal of Hogwarts" aria-label="Journal Field"/>
							        @else
							        <input class="form-control f-o" type="text" name="journal" placeholder="Journal of Hogwarts" aria-label="Journal Field"/>
									@endif
							        <label for="year">Year</label>
							        @if(isset($prefill['message']['created']['date-parts']['0']['0']))
							        <input class="form-control f-o" type="text" name="year" value="{{$prefill['message']['created']['date-parts']['0']['0']}}" placeholder="1999" aria-label="Year Field"/>
							        @else
							    	<input class="form-control f-o" type="text" name="year" placeholder="1999" aria-label="Year Field"/>
							        @endif
							        <label for="month">Month</label>
							        <input class="form-control f-o" type="text" name="month" placeholder="9" aria-label="Month Field"/>
							        <label for="day">Day</label>
							        <input class="form-control f-o" type="text" name="day" placeholder="22" aria-label="Day Field"/>
							        <label for="pages">Pages</label>
							        @if(isset($prefill['message']['page']))
							        <input class="form-control f-o" type="text" name="pages" value="{{$prefill['message']['page']}}" placeholder="2140-2149" aria-label="Page Field"/>
							        @else
							        <input class="form-control f-o" type="text" name="pages" placeholder="2140-2149" aria-label="Page Field"/>
							        @endif
							        {{-- <label for="day">Day</label>
							        <input class="form-control f-o" type="text" name="day" placeholder="22" aria-label="Day Field"/> --}}
							        <input type="submit" class="btn btn-success" value="Import the Article">
							    </div>
							</form>
						@else
							<form id="manual_field" action="/search" method="POST">
							    <div class="form-group flex fd-c">
							        {{ csrf_field() }}
							        <input type="hidden" name="manual" value="1">
							        <label for="doi_val">DOI</label>
							        <input class="form-control f-o" type="text" name="doi_val" placeholder="10.1016/j.psych.2018.01.01" aria-label="DOI Field"/>
							        <label for="name">Title</label>
							        <input class="form-control f-o" type="text" name="name" placeholder="Effects of Psychology Research on Quidditch Players" aria-label="Article Title"/>
							        <label for="journal">Journal</label>
							        <input class="form-control f-o" type="text" name="journal" placeholder="Journal of Hogwarts" aria-label="Journal Field"/>
							        <label for="year">Year</label>
							        <input class="form-control f-o" type="text" name="year" placeholder="1999" aria-label="Year Field"/>
							        <label for="month">Month</label>
							        <input class="form-control f-o" type="text" name="month" placeholder="9" aria-label="Month Field"/>
							        <label for="day">Day</label>
							        <input class="form-control f-o" type="text" name="day" placeholder="22" aria-label="Day Field"/>
							        <label for="pages">Pages</label>
							        <input class="form-control f-o" type="text" name="pages" placeholder="2140-2149" aria-label="Day Field"/>
							        {{-- <label for="day">Day</label>
							        <input class="form-control f-o" type="text" name="day" placeholder="22" aria-label="Day Field"/> --}}
							        <input type="submit" class="btn btn-success" value="Import the Article">
							    </div>
							</form>
						@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection