var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');

    mix.scripts(
        [
            'vendor/jquery.min.js',
            'vendor/materialize.min.js',
            'vendor/angular-1.4.min.js',
            'vendor/angular-ui-router.min.js',
            'vendor/angucomplete-alt.min.js',
            'vendor/moment.js',
            'vendor/lodash.js',
            'frontend/app.js',
            'frontend/factory/**/*.js',
            'frontend/components/**/*.js'
        ],
        'public/js/frontend.js'
    );
});
