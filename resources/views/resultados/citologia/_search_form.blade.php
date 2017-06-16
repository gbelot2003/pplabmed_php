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

<hr/>
<div class="row">
    {{--Diagnostico--}}
    <div class="col-md-12 form-group {{ $errors->has('diagnostico') ? ' has-error' : '' }}">
        <label for="diagnostico">Diagnostico Clinico</label>
        {!! Form::text('diagnostico', null, ['id' => 'diagnostico', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    {{--Deteccion de cancer--}}
    <div class="col-md-3 form-group {{ $errors->has('deteccion_cancer') ? ' has-error' : '' }}">
        <div class="checkbox checkbox-info">
            {!! Form::checkbox('deteccion_cancer', 1, null, ['id' => 'checkbox1']) !!}
            <label for="checkbox1">Detección de Cancer</label>
        </div>
    </div>

    {{--Indice de Maduracion--}}
    <div class="col-md-3 form-group  {{ $errors->has('indice_maduracion') ? ' has-error' : '' }}">
        <div class="checkbox checkbox-info">
            {!! Form::checkbox('indice_maduracion', 1, null, ['id' => 'checkbox2']) !!}
            <label for="checkbox2">Indice de Maduración</label>
        </div>
    </div>

    {{-- Otros 1 --}}
    <div class="col-md-3 form-group  {{ $errors->has('otros_a') ? ' has-error' : '' }}">
        {{ Form::text('otros_a', null, ['class' => 'form-control', 'id' => 'otros_a', 'placeholder' => 'Otros']) }}
    </div>

    {{-- gravidad --}}
    <div class="col-md-3 form-group form-group  {{ $errors->has('gravidad_id') ? ' has-error' : '' }}">
        {{ Form::number('gravidad', null, ['class' => 'form-control', 'id' => 'gravidad', 'placeholder' => 'Gravidad']) }}
    </div>
</div>

<div class="row">
    {{-- id Cito --}}
    <div class="col-md-6 form-group  {{ $errors->has('icitologia_id') ? ' has-error' : '' }}">
        <label>Id Cito:</label>
        {{ Form::select('icitologia_id', $idCIto, null, ['class' => 'form-control', 'placeholder' => 'None']) }}
    </div>

    {{-- Para (Embarazos) --}}
    <div class="col-md-3 form-group  {{ $errors->has('para') ? ' has-error' : '' }}">
        <label for="para">Para: </label>
        {{ Form::number('para', null, ['class' => 'form-control', 'id' => 'para']) }}
    </div>

    {{-- Abortos --}}
    <div class="col-md-3 form-group  {{ $errors->has('abortos') ? ' has-error' : '' }}">
        <label for="abortos">Abortos: </label>
        {{ Form::number('abortos', null, ['class' => 'form-control', 'id' => 'abortos']) }}
    </div>
</div>

<div class="row">
    {{-- F.U.R --}}
    <div class="col-md-3 form-group  {{ $errors->has('fur') ? ' has-error' : '' }}">
        <label for="fur">F.U.R</label>
        {{ Form::date('fur', null, ['class' => 'form-control', 'id' => 'fur']) }}
    </div>

    {{-- F.U.P --}}
    <div class="col-md-3 form-group  {{ $errors->has('fup') ? ' has-error' : '' }}">
        <label for="fup">F.U.P</label>
        {{ Form::date('fup', null, ['class' => 'form-control', 'id' => 'fup']) }}
    </div>

    <div class="col-md-3 form-group">
        <label>Fecha de Informe</label>
        <input name="fecha_informe" type="date"
               class="form-control"
               tabindex="4"
               value="{{ isset($item->fecha_informe) ? $item->fecha_informe->format('Y-m-d') : date("Y-m-d") }}"
        >
    </div>

    {{-- Fécha de Muestra --}}
    <div class="col-md-3 form-group  {{ $errors->has('fecha_muestra') ? ' has-error' : '' }}">
        <label>Fecha de Muestra</label>
        {{ Form::date('fecha_muestra', null, ['class' => 'form-control', 'id' => 'fechamuestra']) }}
    </div>
</div>

<div class="row">
    {{-- Firma 1 --}}
    <div class="col-md-3 form-group  {{ $errors->has('firma_id') ? ' has-error' : '' }}">
        <label>Firma 1:</label>
        {{ Form::select('firma_id', $firmas, null, ['class' => 'form-control', 'placeholder' => 'none']) }}
    </div>

    {{-- Firma 2 --}}
    <div class="col-md-3 form-group  {{ $errors->has('firma2_id') ? ' has-error' : '' }}">
        <label>Firma 2:</label>
        {{ Form::select('firma2_id', $firmas, null, ['placeholder' => 'None', 'class' => 'form-control']) }}
    </div>

    {{-- Otros --}}
    <div class="col-md-4 form-group  {{ $errors->has('otros_b') ? ' has-error' : '' }}">
        <label for="otros2">Otros:</label>
        {{ Form::text('otros_b', null, ['class' => 'form-control', 'id' => 'otros_b']) }}
    </div>

</div>

<div class="row {{ $errors->has('informe') ? ' has-error' : '' }}">
    <div class="col-md-12 form-group">
        <label>Informe</label>
        {{ Form::textarea('informe', null, ['class' => 'textarea form-control ckeditor', 'id' => 'informe']) }}
    </div>
</div>


<div class="col-md-12">
    <div class="text-right">
        <br>
        <a class="btn btn-info" href="{{ action('CitologiaController@index') }}">Cancelar</a>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</div>