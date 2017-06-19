<div class="row">
    {{--Deteccion de cancer--}}
    <div class="col-md-3 form-group {{ $errors->has('deteccion_cancer') ? ' has-error' : '' }}">
        <div class="checkbox checkbox-info">
            {!! Form::checkbox('deteccion_cancer', 1, null, ['id' => 'checkbox1', 'tabindex' => 2]) !!}
            <label for="checkbox1">Detección de Cancer</label>
        </div>
    </div>

    {{--Indice de Maduracion--}}
    <div class="col-md-3 form-group  {{ $errors->has('indice_maduracion') ? ' has-error' : '' }}">
        <div class="checkbox checkbox-info">
            {!! Form::checkbox('indice_maduracion', 1, null, ['id' => 'checkbox2', 'tabindex' => 3]) !!}
            <label for="checkbox2">Indice de Maduración</label>
        </div>
    </div>

    {{-- Otros 1 --}}
    <div class="col-md-6 form-group  {{ $errors->has('otros_a') ? ' has-error' : '' }}">
        {{ Form::text('otros_a', null, ['class' => 'form-control', 'id' => 'otros_a', 'tabindex' => 4, 'placeholder' => 'Otros']) }}
    </div>

</div>

<div class="row">
    {{--Diagnostico--}}
    <div class="col-md-12 form-group {{ $errors->has('diagnostico') ? ' has-error' : '' }}">
        <label>Diagnóstico</label>
        {!! Form::textarea('diagnostico', null, ['tabindex' => 5, 'id' => 'diagnostico', 'class' => 'form-control textarea', 'rows' => 2,
        'placeholder' => 'Diagnostico Clinico']) !!}
    </div>
</div>

<div class="row">
    {{-- F.U.R --}}
    <div class="col-md-3 form-group  {{ $errors->has('fur') ? ' has-error' : '' }}">
        <label>F.U.R.</label>
        <input name="fur" placeholder="F.U.R" type="text"
               class="form-control dateclass"
               tabindex="6"
               value="{{ isset($item->fur) ? $item->fur->format('d/m/Y') : null }}"
               id="">
    </div>

    {{-- F.U.P --}}
    <div class="col-md-3 form-group  {{ $errors->has('fup') ? ' has-error' : '' }}">
        <label>F.U.P.</label>
        <input name="fup"  type="text"
               class="form-control dateclass"
               tabindex="7"
               value="{{ isset($item->fup) ? $item->fup->format('d/m/Y') : null }}"
               id="">
    </div>

    {{-- gravidad --}}
    <div class="col-md-2 form-group form-group  {{ $errors->has('gravidad_id') ? ' has-error' : '' }}">
        <label>Gravidad</label>
        {{ Form::number('gravidad', null, ['tabindex' => 8, 'class' => 'form-control', 'id' => 'gravidad', 'placeholder' => 'Gravidad']) }}
    </div>

    {{-- Para (Embarazos) --}}
    <div class="col-md-2 form-group  {{ $errors->has('para') ? ' has-error' : '' }}">
        <label>Para</label>
        {{ Form::number('para', null, ['tabindex' => 9, 'class' => 'form-control', 'id' => 'para', 'placeholder' => 'Para']) }}
    </div>

    {{-- Abortos --}}
    <div class="col-md-2 form-group  {{ $errors->has('abortos') ? ' has-error' : '' }}">
        <label>Abortos</label>
        {{ Form::number('abortos', null, ['tabindex' => 10, 'class' => 'form-control', 'id' => 'abortos', 'placeholder' => 'Abortos']) }}
    </div>

</div>

<div class="row">
    {{-- id Cito --}}
    <div class="col-md-6 form-group  {{ $errors->has('icitologia_id') ? ' has-error' : '' }}">
        <label>Identificador Citología</label>
        {{ Form::select('icitologia_id', $idCIto, null, ['class' => 'form-control']) }}
    </div>


    {{-- Firma 1 --}}
    <div class="col-md-3 form-group  {{ $errors->has('firma_id') ? ' has-error' : '' }}">
        <label>Firma</label>
        {{ Form::select('firma_id', $firmas, null, ['class' => 'form-control']) }}
    </div>

    {{-- Fécha de Muestra --}}
    <div class="col-md-3 form-group  {{ $errors->has('fecha_muestra') ? ' has-error' : '' }}">
        <label>Fecha de Muestra</label>
        <input name="fecha_muestra" type="text"
               class="form-control dateclass"
               tabindex="11"
               value="{{ isset($item->fecha_muestra) ? $item->fecha_muestra->format('d/m/Y') : null }}"
               id="">
    </div>

</div>

<div class="row">

    {{-- Nota MM --}}
    <div class="col-md-6 form-group  {{ $errors->has('mm') ? ' has-error' : '' }}">
        <br>
        <div class="checkbox checkbox-info">
            {!! Form::checkbox('mm', 1, null, ['id' => 'checkbox3']) !!}
            <label for="checkbox3">Sin Nota de Citología</label>
        </div>
    </div>

    {{-- Firma 2 --}}
    <div class="col-md-3 form-group  {{ $errors->has('firma2_id') ? ' has-error' : '' }}">
        <label>Firma 2</label>
        {{ Form::select('firma2_id', $firmas, null, ['placeholder' => 'None', 'class' => 'form-control', 'id' => 'firma2_id']) }}
    </div>


    {{-- Fécha de Informe --}}
    <div class="col-md-3 form-group  {{ $errors->has('fecha_informe') ? ' has-error' : '' }}">
        <label>Fecha de Informe</label>
        <input name="fecha_informe"  type="text"
               class="form-control dateclass"
               tabindex="12"
               value="{{ isset($item->fecha_informe) ? $item->fecha_informe->format('d/m/Y') : date("d/m/Y") }}"
               id="">
    </div>
    
    {{-- Otros --}}
    <div class="col-md-12 form-group  {{ $errors->has('otros_b') ? ' has-error' : '' }}">
        <label>Otros</label>
        {{ Form::text('otros_b', null, ['class' => 'form-control', 'id' => 'otros_b', 'placeholder' => 'Otros', 'tabindex' => 13]) }}
    </div>
</div>

<div class="row {{ $errors->has('informe') ? ' has-error' : '' }}">

    <div class="col-md-12 form-group">
        <label>Informe</label>
        {{ Form::textarea('informe', null, ['class' => 'textarea form-control ckeditor', 'id' => 'informe', 'tabindex' => 14]) }}
    </div>

</div>

<div class="col-md-12">
    <div class="text-right">
        <br>
        <a class="btn btn-info" href="{{ action('CitologiaController@index') }}">Cancelar/Listado</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
<style>
    .dateclass{
        width:100%;
    }

    .dateclass.placeholderclass::before{
        width:100%;
        content:attr(placeholder);
        background-color:#FFFFFF;
    }

    .dateclass.placeholderclass:hover::before{
        width:0%;
        content:"";
    }
</style>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.config.enterMode = 2;
</script>