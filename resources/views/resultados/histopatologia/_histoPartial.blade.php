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
        <input name="fecha_informe" type="date"
               class="form-control"
               tabindex="4"
               value="{{ isset($item->fecha_informe) ? $item->fecha_informe->format('Y-m-d') : null }}"
               >
    </div>


    <div class="col-md-4 form-group {{ $errors->has('firma_id') ? ' has-error' : '' }}">
        <label>Firma</label>
        {{ Form::select('firma_id', $firmas, null, ['class' => 'form-control', 'id' => 'firma_id']) }}
    </div>

    <div class="col-md-3 form-group {{ $errors->has('topog') ? ' has-error' : '' }}">
        <label>Topología</label>
        {!!  Form::text('topog', null, ['tabindex' => 7, 'id' => 'topog', 'class' => 'form-control', 'id' => 'topog', 'placeholder' => 'Topología'])  !!}
    </div>

</div>


<div class="row">

    <div class="col-md-3 form-group  {{ $errors->has('fecha_biopcia') ? ' has-error' : '' }}">
        <label>Fecha de Biopsia</label>
        <input name="fecha_biopcia"  type="date"
               class="form-control"
               tabindex="5"
               value="{{ isset($item->fecha_biopcia) ? $item->fecha_biopcia->format('Y-m-d') : null }}"
               >
    </div>

    <div class="col-md-4 form-group {{ $errors->has('firma2_id') ? ' has-error' : '' }}">
        <label>Firma 2</label>
        {{ Form::select('firma2_id', $firmas, null, ['placeholder' => 'None', 'class' => 'form-control', 'id' => 'firma2_id']) }}
    </div>

    <div class="col-md-3 form-group  {{ $errors->has('fecha_muestra') ? ' has-error' : '' }}">
        {{--{{ Form::date('fecha_muestra', isset($item->fecha_muestra) ? $item->fecha_muestra : date("Y-m-d"), ['tabindex' => 6, 'class' => 'form-control', 'id' => 'fecha_muestra']) }}--}}
        <label>Fecha de Muestra</label>
        <input name="fecha_muestra" type="date"
               class="form-control"
               tabindex="6"
               value="{{ isset($item->fecha_muestra) ? $item->fecha_muestra->format('Y-m-d') : null }}"
               >
    </div>

    <div class="col-md-2 form-group">
        <div class="checkbox checkbox-info">
            <br>
            {!! Form::checkbox('muestra_entrega', 1, null, ['id' => 'checkbox1', 'tabindex' => 8]) !!}
            <label for="checkbox1">Se entrego muestra?</label>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            @foreach($plantillas as $plantilla)
                <li role="presentation"><a class="bt-insert" href="{{ $plantilla->id }}">{{ $plantilla->name }}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="col-md-12 form-group  {{ $errors->has('fecha_muestra') ? ' has-error' : '' }}">
    {{ Form::textarea('informe', null, ['class' => 'textarea form-control ckeditor', 'id' => 'informe']) }}
</div>
</div>

<div class="row">
    @include('resultados.histopatologia.image._images')
</div>

<div class="col-md-12">
    <div class="text-right">
        <br>
        <a class="btn btn-info" href="{{ action('HistopatologiaController@index') }}">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
