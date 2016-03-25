@extends('layouts.app')

@section('content')
    <div class="container">
        Blogs
        <div class="row">
            @foreach($articles as $article)
                <div class="col l12 s12 m12">
                    {{$article->title}}
                </div>
            @endforeach
        </div>
    </div>
@endsection