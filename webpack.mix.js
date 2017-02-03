const { mix } = require('laravel-mix');

mix.sass('resources/assets/sass/app.scss', 'public/css')
    .combine(['resources/assets/css/login.css'], 'public/css/login.css')
    .combine(
        [
            'resources/assets/js/assets/jquery.js',
            'resources/assets/js/assets/bootstrap.js',
            'resources/assets/js/assets/jquery.dataTables.js',
            'resources/assets/js/assets/bootstrap-switch.js',
            'resources/assets/js/app.js',
        ],
        'public/js/app.js');



