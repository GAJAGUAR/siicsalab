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

mix.js([
  'resources/js/app.js',
  'resources/js/complement.js',
  'node_modules/datatables.net/js/jquery.dataTables.min.js',
  'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
  'node_modules/select2/dist/js/select2.full.min.js'
], 'public/js')
  .extract([
    'datatables.net',
    'datatables.net-bs4',
    'select2'
  ])
  .sass('resources/sass/app.scss', 'public/css');
