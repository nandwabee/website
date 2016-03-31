@extends('layouts.app')

@section('content')
    <div class="blog-header grey darken-3">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <a href="/blogs" class="section-title grey-text text-lighten-2">Blog</a>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="blog-title grey-text text-lighten-2">{{$blog->title}}</div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12">
                    {{$blog->secondary_title}}
                </div>
            </div>
        </div>
    </div>

    <div class="blog-body">
        <div class="container">
            <div class="blog-numbers">
                <span class="post_date">
                    @if($blog->status == 1)
                        {{$blog->published_at}}
                    @else
                        {{$blog->created_at}}
                    @endif
                </span>
                <div class="right">
                    @if(auth()->check())
                        @if(auth()->user()->is_admin)
                            <a href="/blog/{{$blog->nid}}/publish" class="publish-btn right">
                                @if($blog->status == 1)
                                    <span class="btn red darken-4">Unpublish</span>
                                @else
                                    <span class="btn green darken-4">Publish</span>
                                @endif
                            </a>

                            <a class="btn waves-effect waves-light blue edit-btn right" href="/blog/{{$blog->nid}}/edit">
                                <span>Edit</span>
                            </a>
                        @endif
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12">
                    {!! $blog->body !!}
                </div>
            </div>
        </div>
    </div>
@endsection