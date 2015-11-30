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
    //mix.stylesIn("public/css");
    mix.sass('app.scss');

    mix.scripts([
        'components/angular/angular.js',
        'components/jquery/dist/jquery.js',
        'components/spritely/src/jquery.spritely.js',
        'trailer.js',
    ], 'public/js/all.js')
});
