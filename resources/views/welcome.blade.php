@extends('layouts.intro')

@section('content')
    <video poster="https://i.ytimg.com/vi/g7su-byRNyc/maxresdefault.jpg" id="bgvid" playsinline autoplay muted
           loop>
        <source src="/img/dna.mp4" type="video/mp4">
    </video>
    <div class="container">
        <br>
        <br>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div id="login-box">
                <div class="logo">
                    <img src="{{ asset('img/logo_LM.jpg') }}" class="img img-responsive center-block"/>
                    <h1 class="logo-caption"><span class="tweak">PPlab</span>med</h1>
                </div><!-- /.logo -->
                <div class="controls">
                    <div class="row">
                        <div class="col-md-10 col-md-push-1">

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-2 control-label">Usuario</label>
                                <div class="col-md-12">
                                    <input id="username" type="text" class="form-control" name="username"
                                           value="{{ old('username') }}" required autofocus>

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
                        <div class="col-md-10 col-md-push-1">
                            <button type="submit" class="btn btn-default btn-block btn-custom">Login</button>
                        </div>

                    </div>


                </div><!-- /.controls -->
            </div><!-- /#login-box -->
        </form>
    </div><!-- /.container -->
    </div>
@stop
@section('styles')

    <style>
        body {
            margin: 0;
            background: #000;
        }

        video {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -100;
            transform: translateX(-50%) translateY(-50%);
            background: url('https://i.ytimg.com/vi/g7su-byRNyc/maxresdefault.jpg') no-repeat;
            background-size: cover;
            transition: 1s opacity;
        }

        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background: #dbd3d3;
        }

        label {
            color: white;
        }

        .help-block {
            font-size: 1rem;
        }

        #login-box {
            position: absolute;
            top: 18%;
            left: 50%;
            transform: translateX(-50%);
            width: 350px;
            margin: 0 auto;
            border: 1px solid black;
            background: rgba(97, 91, 88, 0.67);
            min-height: 250px;
            padding: 20px;
            z-index: 9999;
        }
        #login-box .logo .logo-caption {
            color: white;
            text-align: center;
            margin-bottom: 0px;
        }
        #login-box .logo .tweak {
            color: #5DFDF2;
        }
        #login-box .controls {
            padding-top: 30px;
        }
        #login-box .controls input {
            border-radius: 0px;
            background: rgb(98, 96, 96);
            border: 0px;
            color: white;
            font-family: 'Nunito', sans-serif;
        }
        #login-box .controls input:focus {
            box-shadow: none;
        }
        #login-box .controls input:first-child {
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
        }
        #login-box .controls input:last-child {
            border-bottom-left-radius: 2px;
            border-bottom-right-radius: 2px;
        }
        #login-box button.btn-custom {
            border-radius: 2px;
            margin-top: 8px;
            background:#5DFDF2;
            border-color: rgba(48, 46, 45, 1);
            color: black;
            font-family: 'Nunito', sans-serif;
        }
        #login-box button.btn-custom:hover{
            -webkit-transition: all 500ms ease;
            -moz-transition: all 500ms ease;
            -ms-transition: all 500ms ease;
            -o-transition: all 500ms ease;
            transition: all 500ms ease;
            background: rgba(48, 46, 45, 1);
            border-color: #5DFDF2;
        }

    </style>
@stop