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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/boxed.css', 'public/css')
    .postCss('resources/css/custom-dark-style.css', 'public/css')
    .postCss('resources/css/custom-style.css', 'public/css')
    .postCss('resources/css/dark-boxed.css', 'public/css')
    .postCss('resources/css/dark-style.css', 'public/css')
    .postCss('resources/css/skins.css', 'public/css')
    .postCss('resources/css/style.css', 'public/css')
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}
