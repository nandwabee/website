@extends('layouts.app')

@section('content')
    <div class="blog-header grey darken-3">
        <div class="container">
            <div class="blog-title grey-text text-lighten-2">{{$blog->title}}</div>
        </div>
    </div>

    <div class="blog-body">
        <div class="container">
            <div class="blog-numbers">
                Published at
            </div>
        </div>
    </div>
@endsection