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
        <div class="col s12 m12 l12">
            <div class="title white-text">404</div>
            <div class="white-text welcome-text">
                <p>I don't have that stuff,Really.<a href="/">Start all over.</a></p>
            </div>
        </div>
    </div>
</div>

<script src="/js/app.js"></script>
</body>
</html>
