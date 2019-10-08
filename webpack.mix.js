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
   .extract([
     'vue',
     'select2',
     'datatables.net',
     'datatables.net-bs4'
   ])
   .sass('resources/sass/app.scss', 'public/css');
mix.scripts(['resources/js/complement.js'], 'public/js/complement.js');
