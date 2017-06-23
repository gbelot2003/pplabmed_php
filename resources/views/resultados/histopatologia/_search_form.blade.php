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

    <div class="col-md-8 form-group  {{ $errors->has('diagnostico') ? ' has-error' : '' }}">
        <label>Diagnóstico</label>
        {{ Form::textarea('diagnostico', null,
        ['tabindex' => 2, 'class' => 'form-control textarea', 'id' => 'diagnostico', 'rows' => 2, 'placeholder' => 'Diagnostico']) }}
    </div>

    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12 form-group {{ $errors->has('mor1') ? ' has-error' : '' }}">
                <label>Morfología 1</label>
                {!!  Form::text('mor1', null, ['class' => 'form-control', 'id' => 'mor1', 'placeholder' => 'Morfología'])  !!}
            </div>

        </div>
    </div>

    <div class="col-md-8 form-group  {{ $errors->has('muestra') ? ' has-error' : '' }}">
        <label>Muestra</label>
        {{ Form::textarea('muestra', null,
        ['tabindex' => 3, 'class' => 'form-control', 'id' => 'muestra', 'rows' => 2, 'placeholder' => 'Muestra']) }}
    </div>

    <div class="col-md-4">
        <div class="row">

            <div class="col-md-12 form-group {{ $errors->has('mor2') ? ' has-error' : '' }}">
                <label>Morfología 2</label>
                {!!  Form::text('mor2', null, ['class' => 'form-control', 'id' => 'mor2', 'placeholder' => 'Morfología 2'])  !!}
            </div>
        </div>
    </div>


</div>

<div class="row">

    <div class="col-md-3 form-group  {{ $errors->has('fecha_informe') ? ' has-error' : '' }}">
        <label>Fecha de Informe</label>
        <input name="fecha_informe" type="text"
               class="form-control dateclass"
               tabindex="4"
               value="{{ isset($item->fecha_informe) ? $item->fecha_informe->format('d/m/Y') : date("d/m/Y") }}"
        >
    </div>


    <div class="col-md-4 form-group {{ $errors->has('firma_id') ? ' has-error' : '' }}">
        <label>Firma</label>
        {{ Form::select('firma_id', $firmas, null, ['placeholder' => 'None', 'class' => 'form-control', 'id' => 'firma_id']) }}
    </div>

    <div class="col-md-3 form-group {{ $errors->has('topog') ? ' has-error' : '' }}">
        <label>Topología</label>
        {!!  Form::text('topog', null, ['tabindex' => 7, 'id' => 'topog', 'class' => 'form-control', 'id' => 'topog', 'placeholder' => 'Topología'])  !!}
    </div>

</div>


<div class="row">

    <div class="col-md-3 form-group  {{ $errors->has('fecha_biopcia') ? ' has-error' : '' }}">
        <label>Fecha de Biopsia</label>
        <input name="fecha_biopcia"  type="text"
               class="form-control dateclass"
               tabindex="5"
               value="{{ isset($item->fecha_biopcia) ? $item->fecha_biopcia->format('d/m/Y') : null }}"
        >
    </div>

    <div class="col-md-4 form-group {{ $errors->has('firma2_id') ? ' has-error' : '' }}">
        <label>Firma 2</label>
        {{ Form::select('firma2_id', $firmas, null, ['placeholder' => 'None', 'class' => 'form-control', 'id' => 'firma2_id']) }}
    </div>

    <div class="col-md-3 form-group  {{ $errors->has('fecha_muestra') ? ' has-error' : '' }}">
        <label>Fecha de Muestra</label>
        <input name="fecha_muestra" type="text"
               class="form-control dateclass"
               tabindex="6"
               value="{{ isset($item->fecha_muestra) ? $item->fecha_muestra->format('d/m/Y') : null }}"
        >
    </div>

</div>

<div class="row">
    <div class="col-md-12 form-group  {{ $errors->has('fecha_muestra') ? ' has-error' : '' }}" tabindex="8">
        {{ Form::textarea('informe', null, ['class' => 'textarea form-control ckeditor', 'id' => 'informe', 'tabindex' => 8]) }}
    </div>
</div>

<div class="row">
    @include('resultados.histopatologia.image._images')
</div>



<div class="col-md-12">
    <div class="text-right">
        <br>
        <a class="btn btn-info" href="{{ action('HistopatologiaController@index') }}">Cancelar</a>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</div>
