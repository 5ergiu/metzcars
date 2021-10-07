const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/bundle/js')
    .js('resources/views/contacts/contacts.js', 'public/bundle/js/pages')
    .sass('resources/sass/app.scss', 'public/bundle/css')
    .sass('resources/sass/vendor.scss', 'public/bundle/css')
    .sourceMaps()
    .webpackConfig({devtool: 'source-map'})
