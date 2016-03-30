@extends('layouts.app')

@section('content')
    <div class="blog-header grey darken-3">
        <div class="container">
            <div class="blog-title grey-text text-lighten-2">{{$blog->title}}</div>
        </div>
    </div>

    <div class="blog-body">
        <div class="container">
            @if(auth()->check())
                @if(auth()->user()->is_admin)
                    <a class="btn-floating btn-large waves-effect waves-light blue edit-btn" href="/blog/{{$blog->nid}}/edit">
                        <i class="mdi mdi-pencil"></i>
                    </a>
                @endif
            @endif

            <div class="blog-numbers">
                Published at
            </div>

            <div class="row">
                <div class="col s12 m12 l12">
                    {!! $blog->body !!}
                </div>
            </div>
        </div>
    </div>
@endsection