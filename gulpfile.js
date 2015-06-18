var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass("app.scss");

//    .copy("public/js/vendor/normalize-css/normalize.css", "public/css/vendor/normalize.css");

    // .styles([
    // 	"app.css",
    // 	"vendor/normalize.css"
    // ], "public/css/vendor/", "public/css/");
});
