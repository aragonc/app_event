const mix = require('laravel-mix');
require('laravel-mix-eslint-config');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js');


mix.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css/admin');

mix.copyDirectory('resources/img', 'public/img');
mix.copyDirectory('resources/css', 'public/css');
mix.copyDirectory('resources/fonts', 'public/fonts');
mix.copyDirectory('resources/js', 'public/js');
mix.copyDirectory('node_modules/gijgo', 'public/js/gijgo');
mix.copyDirectory('node_modules/sweetalert2', 'public/vendor/sweetalert2');