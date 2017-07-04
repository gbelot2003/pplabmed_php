const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
        .sass('login.scss')
        .webpack('app.js')
        .webpack('custom.js')

        .scripts(
            ['scripts/citologias-create.js'
            ], 'public/js/citologias-create.js')

        .scripts(
            ['scripts/citologias-form.js', 'scripts/citologias-facturas.js'
        ], 'public/js/citologias-form.js')

        .scripts(
            ['scripts/histopatologia-create.js',
            ], 'public/js/histopatologia-create.js')

        .scripts(
            ['scripts/histopatologia-form.js', 'scripts/citologias-facturas.js'
        ], 'public/js/histopatologia-form.js')

        .scripts(
            ['scripts/image-form.js'
        ], 'public/js/images-form.js')

        .scripts([
            'assets/jquery.js',
            'assets/bootstrap.js',
            'assets/jquery.dataTables.js',
            'assets/bootstrap-toggle.min.js',
            'assets/toastr.min.js',
            'assets/moment.js',
            'assets/select2.full.min.js',
            'assets/jquery.colorbox.js',
            'assets/jquery.inputmask.bundle.js',
        ], 'public/js/app2.js');

    mix.less('login2.less');
});