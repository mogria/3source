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
    mix.sass([
        'app.scss',
        'droid-sans-mono-dotted.scss'
    ]);

    mix.scripts([
        'components/angular/angular.js',
        'components/angular-route/angular-route.js',
        'components/jquery/dist/jquery.js',
        'components/spritely/src/jquery.spritely.js',
        'app.js',
        'routes.js',
        'services.js',
        'services/DungeonService.js',
        'controllers.js',
        'controllers/HomeCtrl.js',
    ], 'public/js/all.js')
});
