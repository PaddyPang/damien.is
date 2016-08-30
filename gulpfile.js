const elixir = require('laravel-elixir');

require('laravel-elixir-vue');
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

elixir(mix => {
    mix.copy('bower_components', 'public/bower_components');
    mix.copy('resources/assets/fonts', 'public/fonts');

    mix.sass('app.scss');

    mix.webpack('app.js');

    mix.scripts([
        '../../resources/assets/js/libraries/*.js'
    ], 'public/js/vendor.js', bowerComponents);

    mix.version(['css/app.css', 'js/app.js', 'js/vendor.js']);
});
