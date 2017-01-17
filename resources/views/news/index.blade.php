@extends('layouts.app')

@section('content')

<div class="container custom-top-margin">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <p class="prod-title">Последние новости студгородка</p>
                @if(!Auth::guest() && Auth::user()->moderator)
                &nbsp<a href="{{ url('/news/create') }}"><button type="button" class="btn btn-info">Написать новость</button></a>
                @endif
                </div>

                <div class="panel-body">
                    @foreach($blogs as $blog)
		                <p class="prod-title">
							<a href="{{ action('BlogsController@show', [$blog->id]) }}">{{ $blog->title }}</a>
						</p>
						<p class="timestamp">{{ $blog->created_at->diffForHumans() }}</p>
						<hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection