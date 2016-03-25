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
<body class="app" @if(Session::has('status'))data-filling-form="true"@endif>
    <div class="navbar-fixed">
        <nav class="grey darken-4">
            <div class="nav-wrapper">
                <div class="container">
                    <ul class="right">
                        <li><a href="/#hire-me" class="hire-me-button">HIRE ME</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')
<script src="/js/frontend.js"></script>
</body>
</html>
