@extends('simple_blog.inc.layout')

@section('content')

    <h1 class="text-center">{{ $page_title }}</h1>
    <h5 class="text-center">Posted On: {{ $page_date }}</h5>
    <div class="container row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <p>{{ $page_html }}</p>
        </div>
    </div>
@stop