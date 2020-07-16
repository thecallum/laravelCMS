const mix = require("laravel-mix");

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

// mix.js("resources/js/app.js", "public/js");
mix.js("resources/js/admin/search.js", "public/js/admin");
mix.js("resources/js/admin/pages/show.js", "public/js/admin/pages");
mix.js("resources/js/admin/pages/create.js", "public/js/admin/pages");

mix.sass("resources/sass/app.scss", "public/css");
