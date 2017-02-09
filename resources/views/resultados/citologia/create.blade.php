@extends('layouts.app-form')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h4>Agregar de Citología</h4>
                    </div>
                    <div class="panel-body" id="app">
                        <form action="post">
                            <cito-form></cito-form>
                            @include('resultados.citologia._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop