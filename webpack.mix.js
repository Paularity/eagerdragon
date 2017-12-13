let mix = require('laravel-mix');

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

mix.sass('resources/assets/sass/app.scss', 'public/css/sass.css')
	.styles([
		'resources/assets/theme/css/custom.css',
		'public/css/sass.css',
		'resources/assets/theme/css/app-green.css',
		'resources/assets/theme/css/vendor.css'
	], 'public/css/all.css')
	.js([
		'resources/assets/js/app.js',
	], 'public/js/app.js')
	.styles([
		'node_modules/dropzone/dist/dropzone.css',
	], 'public/css/plugins.css')
	.js([
		'node_modules/dropzone/dist/dropzone.js',
	], 'public/js/plugins.js')
	.copy('resources/assets/img/america.png', 'public/resources/assets/flags/america.png')
	.copy('resources/assets/img/spain.png', 'public/resources/assets/flags/spain.png')
	.copy('resources/assets/img/default-avatar.png', 'public/img/default-avatar.png')
	.copy('resources/assets/theme/js/app.js', 'public/js/theme-app.js')
	.copy('resources/assets/theme/js/vendor.js', 'public/js/theme-vendor.js');