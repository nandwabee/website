@extends('layouts.app')

@section('content')
    <div class="blog-header grey darken-3">
        <div class="container">
            <div class="blog-title grey-text text-lighten-2">{{$blog->title}}</div>
        </div>
    </div>

    <div class="blog-body">
        <div class="container">
            <a class="btn-floating btn-large waves-effect waves-light blue edit-btn" href="/blog/{{$blog->nid}}/edit">
                <i class="mdi mdi-pencil"></i>
            </a>

            <div class="blog-numbers">
                Published at
            </div>
        </div>
    </div>
@endsection