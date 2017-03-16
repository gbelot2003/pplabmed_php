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

    <div class="col-md-3 form-group  {{ $errors->has('diagnostico') ? ' has-error' : '' }}">
        <label for="para">Diagnostico: </label>
        {{ Form::date('diagnostico', null, ['class' => 'form-control', 'id' => 'diagnostico']) }}
    </div>

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
</div>

<div class="row">
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

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            @foreach($plantillas as $plantilla)
                <li role="presentation"><a class="bt-insert" href="{{ $plantilla->id }}">{{ $plantilla->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>

<div class="col-md-12">
    <div class="text-right">
        <br>
        <a class="btn btn-info" href="{{ action('HistopatologiaController@index') }}">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
