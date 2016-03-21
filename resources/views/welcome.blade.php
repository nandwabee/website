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
        <div class="navbar-fixed">
            <nav class="grey darken-4">
                <div class="nav-wrapper">
                    <ul class="right">
                        <li><a href="/#hire-me" class="hire-me-button">HIRE ME</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container">
            <div class="row welcome-row">
                <div class="col s12 m12 l12">
                    <div class="title white-text">Bernard Nandwa</div>
                    <div class="white-text welcome-text">
                        <p>Full stack developer.Somewhere in Nairobi.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container hire-request-container" id="hire-me">
            <h5 class="grey-text">Hire Me</h5>

            <h6>
                @if(Session::has('status'))
                    {{Session::get('status')}}
                @endif
            </h6>
            <div class="row">
                <form class="col s12 l12 m12" action="/hireme" method="post">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="input-field col s12 l6 m6">
                        <input name="name" id="name" type="text" class="validate white-text" value="{{old('name')}}">
                        <label for="name" class="active">Name</label>
                    </div>

                    <div class="input-field col s12 l6 m6">
                        <input name="email" id="email" type="email" class="validate white-text" value="{{old('email')}}">
                        <label for="email" class="active">Email</label>
                    </div>

                    <div class="input-field col s12 l6 m6">
                        <input name="phone" id="phone" type="text" class="validate white-text" value="{{old('phone')}}">
                        <label for="phone" class="active">Phone (optional)</label>
                    </div>

                    <div class="input-field col s12 l6 m6">
                        <input name="website" id="website" type="text" class="validate white-text" value="{{old('website')}}">
                        <label for="website" class="active">Website (optional)</label>
                    </div>

                    <div class="input-field col s12 l6 m6 budget-field">
                        <select name="scope" id="scope" class="browser-default grey darken-4 white-text" value="{{old('scope')}}">
                            <option value="Code">Code</option>
                            <option value="Design">Design</option>
                            <option value="Other">Other</option>
                        </select>
                        <label for="scope" class="active">Type of work</label>
                    </div>

                    <div class="input-field col s12 l6 m6 budget-field">
                        <select name="budget" id="budget" class="browser-default grey darken-4 white-text" value="{{old('budget')}}">
                            <option value="Below 50000">Below 50000 KES (500 USD)</option>
                            <option value="Over 500000">Over 500000 KES (5000 USD)</option>
                        </select>
                        <label for="budget" class="active">Budget</label>
                    </div>

                    <div class="input-field col s12 l12 m12">
                        <textarea name="message" id="message" class="materialize-textarea white-text">{{old('message')}}</textarea>
                        <label for="message" class="active">Message</label>
                    </div>

                    <div class="col s12 m12 l12">
                        <button class="btn waves-effect waves-light indigo" type="submit" name="action">
                            Send request
                        </button>
                    </div>
                </form>
            </div>

            <div class="row email-button row">
                <div class="col s12 m12 l12 grey-text">
                    Don't like forms? <a href="mailto:bernard@nandwa.com">Send me an email</a> instead.
                </div>
            </div>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
