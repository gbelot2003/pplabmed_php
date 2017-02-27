@extends('layouts.intro')

@section('content')
    <div class="wrapper">
        <div class="loader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="container">
            <br>
            <br>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div id="login-box">
                    <div class="logo">
                        <img src="{{ asset('img/Logo.jpg') }}" class="img img-responsive center-block"/>
                        <h1 class="logo-caption"><span class="tweak">PPlab</span>med</h1>
                    </div><!-- /.logo -->
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-10 col-md-push-1">

                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-2 control-label">Usuario</label>
                                    <div class="col-md-12">
                                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">

                                    <label for="password" class="col-md-2 control-label">Password</label>
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-default btn-block btn-custom">Login</button>
                    </div><!-- /.controls -->
                </div><!-- /#login-box -->
            </form>
        </div><!-- /.container -->
    </div>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background: #dbd3d3;
/*            background: -moz-radial-gradient(center, ellipse cover, #2d9b95 0%, #0e1329 100%);
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #2d9b95), color-stop(100%, #0e1329));
            background: -webkit-radial-gradient(center, ellipse cover, #2d9b95 0%, #0e1329 100%);
            background: -o-radial-gradient(center, ellipse cover, #2d9b95 0%, #0e1329 100%);
            background: -ms-radial-gradient(center, ellipse cover, #f3edfd 0%, #dbd3d3 100%);
            background: radial-gradient(ellipse at center, #2d9b95 0%, #0e1329 90%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2d9b95', endColorstr='#0e1329', GradientType=1*/
            );
        }






        label{
            color: white;
        }

        .help-block {
            font-size: 1rem;
        }




    </style>
@stop
@section('styles')
    <link href="{{ asset('css/login2.css') }}" rel="stylesheet">
@stop