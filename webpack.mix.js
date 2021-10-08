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
    .js('resources/js/components/selectsAutovit.js', 'public/bundle/js/components')
    .js('resources/views/portfolio/portfolio.js', 'public/bundle/js/pages')
    .sass('resources/sass/app.scss', 'public/bundle/css')
    .sass('resources/sass/vendor.scss', 'public/bundle/css')
    .sass('resources/views/home/home.scss', 'public/bundle/css/pages')
    .sass('resources/views/stock/stock.scss', 'public/bundle/css/pages')
    .sass('resources/views/portfolio/portfolio.scss', 'public/bundle/css/pages')
    .sass('resources/views/contacts/contacts.scss', 'public/bundle/css/pages')

    .sourceMaps()
    .webpackConfig({devtool: 'source-map'})
