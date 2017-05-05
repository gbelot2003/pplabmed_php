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

<div class="row">
    <div class="col-md-2 form-group {{ $errors->has('topog') ? ' has-error' : '' }}">
        <label for="topog">Topología</label>
        {!!  Form::text('topog', null, ['class' => 'form-control', 'id' => 'topog'])  !!}
    </div>

    <div class="col-md-2 form-group {{ $errors->has('mor1') ? ' has-error' : '' }}">
        <label for="mor1">Mofología</label>
        {!!  Form::text('mor1', null, ['class' => 'form-control', 'id' => 'mor1'])  !!}
    </div>

    <div class="col-md-2 form-group {{ $errors->has('mor2') ? ' has-error' : '' }}">
        <label for="mor2">Mofología 2</label>
        {!!  Form::text('mor2', null, ['class' => 'form-control', 'id' => 'mor2'])  !!}
    </div>

    <div class="col-md-3 form-group {{ $errors->has('firma_id') ? ' has-error' : '' }}">
        <label for="firma_id">Firma</label>
        {{ Form::select('firma_id', $firmas, null, ['class' => 'form-control', 'id' => 'firma_id']) }}
    </div>

    <div class="col-md-3 form-group {{ $errors->has('firma2_id') ? ' has-error' : '' }}">
        <label for="firma2_id">Firma 2</label>
        {{ Form::select('firma2_id', $firmas, null, ['placeholder' => 'None', 'class' => 'form-control', 'id' => 'firma2_id']) }}
    </div>
</div>

<div class="row">

    <div class="col-md-12 form-group  {{ $errors->has('diagnostico') ? ' has-error' : '' }}">
        <label for="para">Diagnostico: </label>
        {{ Form::text('diagnostico', null, ['class' => 'form-control', 'id' => 'diagnostico']) }}
    </div>

</div>

<div class="row">

    <div class="col-md-3 form-group  {{ $errors->has('muestra') ? ' has-error' : '' }}">
        <label for="para">Muestra: </label>
        {{ Form::date('muestra', null, ['class' => 'form-control', 'id' => 'muestra']) }}
    </div>

    <div class="col-md-3 form-group  {{ $errors->has('fecha_informe') ? ' has-error' : '' }}">
        <label for="para">Fecha de Informe: </label>
        {{ Form::date('fecha_informe', null, ['class' => 'form-control', 'id' => 'fecha_informe']) }}
    </div>

    <div class="col-md-3 form-group  {{ $errors->has('fecha_biopcia') ? ' has-error' : '' }}">
        <label for="para">Fecha de Biopcia: </label>
        {{ Form::date('fecha_biopcia', null, ['class' => 'form-control', 'id' => 'fecha_biopcia']) }}
    </div>

    <div class="col-md-3 form-group  {{ $errors->has('fecha_muestra') ? ' has-error' : '' }}">
        <label for="para">Fecha de Muestra: </label>
        {{ Form::date('fecha_muestra', null, ['class' => 'form-control', 'id' => 'fecha_muestra']) }}
    </div>
</div>

<div class="row">
    <div class="col-md-12 form-group  {{ $errors->has('fecha_muestra') ? ' has-error' : '' }}"">
    {{ Form::textarea('informe', null, ['class' => 'textarea form-control ckeditor', 'id' => 'informe']) }}
</div>
</div>


<div class="col-md-12">
    <div class="text-right">
        <br>
        <a class="btn btn-info" href="{{ action('HistopatologiaController@index') }}">Cancelar</a>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</div>
