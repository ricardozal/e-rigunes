const mix = require('laravel-mix');

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

mix.less('resources/less/e-rigunes.less', 'public/css/e-rigunes.css');
mix.less('resources/less/admin-rigunes.less', 'public/css/admin-rigunes.css');

mix.react('resources/js/shopping_cart/resume.js',
    'public/js/shopping_cart/shopping_cart.js');

mix.js('resources/js/app.js', 'public/vue/js');
