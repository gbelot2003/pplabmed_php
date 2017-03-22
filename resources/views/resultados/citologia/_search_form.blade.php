<div class="row">
    <div class="form-group col-md-2">
        <label>Numero Serial</label>
        {!! Form::text('serial', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-md-2">
        <label for="factura">No. Factura</label>
        {{ Form::number('factura_id',  null, ['class' => 'form-control box-style', 'id' => 'factura'] ) }}
    </div>

    <div class="col-md-4 form-group ">
        <label for="paciente">Paciente</label>
        {{ Form::text('nombre_completo_cliente', null, ['class' => 'form-control box-style', 'id' => 'paciente'] ) }}
    </div>

    <div class="col-md-2 form-group">
        <label>Edad</label>
        {{ Form::text('edad', null, ['class' => 'form-control box-style', 'id' => 'edad']) }}
    </div>

    <div class="col-md-2 form-group">
        <label for="sexo">Sexo</label>
        {{ Form::text('sexo', null, ['class' => 'form-control box-style', 'id' => 'sexo']) }}
    </div>
</div>

<div class="row">
    <div class="col-md-3 form-group">
        <label for="email">Correo Electrónico</label>
        {{ Form::email('correo',  null, ['class' => 'form-control box-style', 'id' => 'email']) }}
    </div>

    <div class="col-md-3 form-group ">
        <label for="email">Correo Electrónico 2</label>
        {{ Form::text('correo2', null, ['class' => 'form-control box-style', 'id' => 'email']) }}
    </div>

    <div class="col-md-3 form-group">
        <label for="direccion">Dirección de Entrega</label>
        {{ Form::text('direccion_entrega_sede', null, ['class' => 'form-control box-style', 'id' => 'direccion']) }}
    </div>

    <div class="col-md-3 form-group ">
        <label for="medico">Medico</label>
        {!! Form::text('medico', null, ['class' => 'form-control box-style', 'id' => 'medico']) !!}
    </div>
</div>

<div class="col-md-12">
    <div class="text-right">
        <br>
        <a class="btn btn-info" href="{{ action('CitologiaController@index') }}">Cancelar</a>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</div>