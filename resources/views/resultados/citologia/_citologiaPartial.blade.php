<hr/>
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
        {{ Form::select('gravidad_id', $gravidad, null, ['class' => 'form-control','placeholder' => 'Gravidad']) }}
    </div>
</div>

<div class="row">
    {{-- id Cito --}}
    <div class="col-md-6 form-group  {{ $errors->has('icitologia_id') ? ' has-error' : '' }}">
        <label>Id Cito:</label>
        {{ Form::select('icitologia_id', $idCIto, null, ['class' => 'form-control']) }}
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

    {{-- Fécha de Informe --}}
    <div class="col-md-3 form-group  {{ $errors->has('fecha_informe') ? ' has-error' : '' }}">
        <label>Fecha de Informe</label>
        {{ Form::date('fecha_informe', null, ['class' => 'form-control', 'id' => 'fechainforme']) }}
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
        {{ Form::select('firma_id', $firmas, null, ['class' => 'form-control']) }}
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

    {{-- Nota MM --}}
    <div class="col-md-2 form-group  {{ $errors->has('mm') ? ' has-error' : '' }}">
        <br>
        <div class="checkbox checkbox-info">
            {!! Form::checkbox('mm', 1, null, ['id' => 'checkbox3']) !!}
            <label for="checkbox3">Nota de Citología</label>
        </div>
    </div>

</div>

<div class="row {{ $errors->has('diagnostico_clinico') ? ' has-error' : '' }}">
    <div class="col-md-12 form-group">
        <label>Diagnóstico Clinico</label>
        {{ Form::textarea('diagnostico_clinico', null, ['class' => 'textarea form-control ckeditor', 'id' => 'diagnostico']) }}
    </div>
</div>

<div class="col-md-12">
    <div class="text-right">
        <br>
        <a class="btn btn-info" href="{{ action('CitologiaController@index') }}">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>