var elixir = require('laravel-elixir');
var bowerComponents = 'public/bower_components';

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

    mix.scripts('app.js', 'public/js/app.js');

    mix.scripts([
        'jquery/dist/jquery.js',
        'bootstrap-sass/assets/javascripts/bootstrap.js',
        '../../resources/assets/js/libraries/*.js',
    ], 'public/js/vendor.js', bowerComponents);

    mix.version(['css/app.css', 'js/app.js', 'js/vendor.js']);

    mix.copy('resources/assets/fonts', 'public/fonts');
});
