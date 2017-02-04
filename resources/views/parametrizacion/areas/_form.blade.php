<div class="row">
    <div class="col-md-10 col-md-push-1 form-group box-style">
        <label for="nombre">Nombre de Área</label>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-2 col-md-push-1 box-style">
        <label for="state">Estado</label>
        <br>
        <div class="control">
            {!! Form::select('state', [0 => 'OFF', 1 => 'ON'], null, ['class' => 'switch control']) !!}
        </div>
        <span class="glyphicon glyphicon-ok-sign" style="color: red">

        </span>
    </div>
</div>

<style type="text/css">
    .control{
        display: inline-block;
        position: relative;
    }
</style>