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

mix.scripts([
	'resources/js/bootstrap.js',
	'resources/js/app.min.js',
	'resources/js/jquery.dataTables.min.js',
	'resources/js/dataTables.bootstrap4.min.js',
	'resources/js/bootstrap-select.min.js',
	'resources/js/jquery.number.min.js',
	'resources/js/toastr.js',
	'resources/js/vue.js'
	], 'public/js/app.js').version();

mix.styles([
	'resources/css/bootstrap.css',
	'resources/css/dataTables.bootstrap4.min.css',
	'resources/css/AdminLTE.min.css',
	'resources/css/font-awesome.css',
	'resources/css/bootstrap-select.min.css',
	'resources/css/test.css',
	'resources/css/toastr.css'
	], 'public/css/app.css').version();


mix.js('resources/js/app.js', 'public/js/app_login.js')
   .sass('resources/sass/app.scss', 'public/css/app_login.css');