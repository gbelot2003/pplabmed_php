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
                        <input type="text" name="username" placeholder="username" class="form-control" />
                        <input type="password" name="password" placeholder="Password" class="form-control" />
                        <button type="submit" class="btn btn-default btn-block btn-custom">Login</button>
                    </div><!-- /.controls -->
                </div><!-- /#login-box -->
            </form>
        </div><!-- /.container -->
    </div>
    <style>
        body{
            margin: 0;
            padding: 0;
            overflow: hidden;
            background: #2d9b95;
            background: -moz-radial-gradient(center, ellipse cover, #2d9b95 0%, #0e1329 100%);
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,#2d9b95), color-stop(100%,#0e1329));
            background: -webkit-radial-gradient(center, ellipse cover, #2d9b95 0%,#0e1329 100%);
            background: -o-radial-gradient(center, ellipse cover, #2d9b95 0%,#0e1329 100%);
            background: -ms-radial-gradient(center, ellipse cover, #2d9b95 0%,#0e1329 100%);
            background: radial-gradient(ellipse at center, #2d9b95 0%,#0e1329 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2d9b95', endColorstr='#0e1329',GradientType=1 );
    </style>
@stop
@section('styles')
    <link href="{{ asset('css/login2.css') }}" rel="stylesheet">
@stop