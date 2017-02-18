@extends('layouts.app')

@section('content')
<div class="container custom-top-margin">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading prod-title">{{ $blog->title }}</div>
                <div class="panel-body">
                    <p class="timestamp">{{ $blog->created_at->diffForHumans() }}</p>
                    <article>{!! nl2br(e($blog->body)) !!}</article>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection