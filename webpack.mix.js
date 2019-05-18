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
    'node_modules/jquery/dist/jquery.js', // This file is necessary
    'node_modules/popper.js/dist/umd/popper.js', // This file is necessary
    'node_modules/bootstrap/dist/js/bootstrap.js', // this is the full version
    //'node_modules/jquery.easing/jquery.easing.js',
    //'node_modules/select2/dist/js/select2.full.js',
    //'node_modules/spin.js/spin.js',

    // Those are from now ui kit pro OPTIONAL
    //'resources/assets/js/plugins/moment.min.js',
    //'resources/assets/js/plugins/bootstrap-switch.js',
    //'resources/assets/js/plugins/bootstrap-tagsinput.js',
    //'resources/assets/js/plugins/bootstrap-selectpicker.js',
    //'node_modules/jasny-bootstrap/dist/js/jasny-bootstrap.js',
    //'resources/assets/js/plugins/jasny-bootstrap.min.js',
    //'resources/assets/js/plugins/nouislider.min.js',
    //'resources/assets/js/plugins/bootstrap-datetimepicker.min.js',
    // end of now ui kit pro

    //'node_modules/pickadate/lib/picker.js', // pickadate library for both date and time
    //'node_modules/pickadate/lib/picker.date.js', // pickadate library only for date field
    //'node_modules/pickadate/lib/picker.date.js', // pickadate library only for time field

    // This is from now ui kit pro REQUIRED
    //'resources/assets/js/now-ui-kit.js',

    'resources/js/scripts.js'
], 'public/js/scripts.js').version();

mix.sass('resources/sass/app.scss', 'public/css');

mix.browserSync('ordini.test');

