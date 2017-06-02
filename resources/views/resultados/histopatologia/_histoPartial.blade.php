<div class="row">

    <div class="col-md-8 form-group  {{ $errors->has('diagnostico') ? ' has-error' : '' }}">
        <label for="para">Diagnostico: </label>
        {{ Form::textarea('diagnostico', null, ['tabindex' => 2, 'class' => 'form-control textarea', 'id' => 'diagnostico', 'rows' => 3]) }}
    </div>

    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12 form-group {{ $errors->has('mor1') ? ' has-error' : '' }}">
                <label for="mor1">Morfología</label>
                {!!  Form::text('mor1', null, ['class' => 'form-control', 'id' => 'mor1'])  !!}
            </div>

        </div>
    </div>

    <div class="col-md-8 form-group  {{ $errors->has('muestra') ? ' has-error' : '' }}">
        <label for="para">Muestra: </label>
        {{ Form::textarea('muestra', null, ['tabindex' => 3, 'class' => 'form-control', 'id' => 'muestra', 'rows' => 3]) }}
    </div>

    <div class="col-md-4">
        <div class="row">

            <div class="col-md-12 form-group {{ $errors->has('mor2') ? ' has-error' : '' }}">
                <label for="mor2">Morfología 2</label>
                {!!  Form::text('mor2', null, ['class' => 'form-control', 'id' => 'mor2'])  !!}
            </div>
        </div>
    </div>


</div>

<div class="row">

    <div class="col-md-3 form-group  {{ $errors->has('fecha_informe') ? ' has-error' : '' }}">
        <label for="para">Fecha de Informe: </label>
        {{ Form::date('fecha_informe',  isset($item->fecha_informe) ? $item->fecha_informe : date("Y-m-d"), ['tabindex' => 4, 'class' => 'form-control', 'id' => 'fecha_informe']) }}
    </div>


    <div class="col-md-6 form-group {{ $errors->has('firma_id') ? ' has-error' : '' }}">
        <label for="firma_id">Firma</label>
        {{ Form::select('firma_id', $firmas, null, ['class' => 'form-control', 'id' => 'firma_id']) }}
    </div>

    <div class="col-md-3 form-group {{ $errors->has('topog') ? ' has-error' : '' }}">
        <label for="topog">Topología</label>
        {!!  Form::text('topog', null, ['tabindex' => 7, 'id' => 'topog', 'class' => 'form-control', 'id' => 'topog'])  !!}
    </div>

</div>


<div class="row">

    <div class="col-md-3 form-group  {{ $errors->has('fecha_biopcia') ? ' has-error' : '' }}">
        <label for="para">Fecha de Biopsia: </label>
        {{ Form::date('fecha_biopcia',  isset($item->fecha_biopcia) ? $item->fecha_biopcia : date("Y-m-d"), ['tabindex' => 5, 'class' => 'form-control', 'id' => 'fecha_biopcia']) }}
    </div>

    <div class="col-md-6 form-group {{ $errors->has('firma2_id') ? ' has-error' : '' }}">
        <label for="firma2_id">Firma 2</label>
        {{ Form::select('firma2_id', $firmas, null, ['placeholder' => 'None', 'class' => 'form-control', 'id' => 'firma2_id']) }}
    </div>

    <div class="col-md-3 form-group  {{ $errors->has('fecha_muestra') ? ' has-error' : '' }}">
        <label for="para">Fecha de Muestra: </label>
        {{ Form::date('fecha_muestra', isset($item->fecha_muestra) ? $item->fecha_muestra : date("Y-m-d"), ['tabindex' => 6, 'class' => 'form-control', 'id' => 'fecha_muestra']) }}
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

    <div class="col-md-12 form-group  {{ $errors->has('fecha_muestra') ? ' has-error' : '' }}"
    ">
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
