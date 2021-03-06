@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h4>New Blog</h4>
            <form role="form" method="POST" action="{{ url('/blogs') }}">
                {!! csrf_field() !!}

                <div class="input-field col s12 l12 m12">
                    <input id="title" type="text" class="validate" name="title">
                    <label for="title">Title</label>
                </div>

                <div class="input-field col s12 l12 m12">
                    <textarea id="secondary_title" class="validate materialize-textarea" name="secondary_title">{{old('secondary_title')}}</textarea>
                    <label for="secondary_title">Secondary Title</label>
                </div>

                <div class="input-field col s12 l12 m12">
                    <textarea id="body" class="validate materialize-textarea" name="body">{{old('body')}}</textarea>
                    <label for="body">Body</label>
                </div>

                <div class="col s12 l12 m12">
                    <button class="btn waves-effect waves-light" type="submit" name="action">
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection