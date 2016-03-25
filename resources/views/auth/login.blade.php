<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#212121">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <title>Bernard Nandwa - Full Stack Developer</title>
    {!! Analytics::render() !!}
</head>
<body class="grey darken-4" id="frontpage" @if(Session::has('status'))data-filling-form="true"@endif>
<div class="container">
    <div class="row welcome-row">
        <div class="col s12 m6 l6">
            <div class="title white-text">Login</div>
            <div class="white-text welcome-text">
                <p>Sign in and get some powers.</p>
            </div>
        </div>

        <div class="col s12 m6 l6">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i>Login
                        </button>

                        {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>--}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="/js/app.js"></script>
</body>
</html>
