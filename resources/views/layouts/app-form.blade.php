<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PPlabmed</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    @yield('styles')
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        @include('layouts.partials.layout._nav')
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app2.js') }}"></script>
    <script src="{{ asset('js/custom2.js') }}"></script>

    @yield('jscode')
    <style>
        <!--
        .navbar {
            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#2d9b95+-1,0e1329+100,278180+100,0e1329+100,2d9b95+100 */
            background: #2d9b95; /* Old browsers */
            background: -moz-linear-gradient(top,  #2d9b95 -1%, #0e1329 100%, #278180 100%, #0e1329 100%, #2d9b95 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top,  #2d9b95 -1%,#0e1329 100%,#278180 100%,#0e1329 100%,#2d9b95 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom,  #2d9b95 -1%,#0e1329 100%,#278180 100%,#0e1329 100%,#2d9b95 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2d9b95', endColorstr='#2d9b95',GradientType=0 ); /* IE6-9
        -->
    </style>

    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
</body>
</html>
