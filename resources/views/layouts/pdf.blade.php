<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">

    <title>PPlabmed</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
<body>
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('flash::message')
            </div>
        </div>
    </div>
    @yield('content')
</div>
</body>
</html>
