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

mix.sass('resources/assets/sass/frontend/app.scss', 'public_html/css/frontend.css')
    .sass('resources/assets/sass/backend/app.scss', 'public_html/css/backend.css')
    .js('resources/assets/js/frontend/app.js', 'public_html/js/frontend.js')
    .js([
        'resources/assets/js/backend/before.js',
        'resources/assets/js/backend/app.js',
        'resources/assets/js/backend/after.js'
    ], 'public_html/js/backend.js');

if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
    mix.version();
}
