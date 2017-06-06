<div class="row">
    <div class="form-group col-md-2 {{ $errors->has('serial') ? ' has-error' : '' }}">
            {!! Form::hidden('link_id', isset($link->id) ? $link->id : null) !!}
            @if(isset($item->serial))
                <span class="text-center form-control">
                    {{ $item->serial }}
                    {!! Form::hidden('id', $item->id) !!}
                </span>
            @else
                <span class="text-center form-control">
                {{ $serial }}
                </span>
                {!! Form::hidden('serial', $serial) !!}
            @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('factura_id') ? ' has-error' : '' }}">
        {{ Form::number('factura_id', isset($item->facturas->name) ? $item->facturas->name : null,
            ['tabindex' => 1, 'class' => 'form-control box-style yellow', 'id' => 'factura', 'require', 'placeholder' => 'No. Factura'] ) }}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('factura_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="col-md-4 form-group  {{ $errors->has('nombre_completo_cliente') ? ' has-error' : '' }}">
        {{ Form::text('nombre_completo_cliente', isset($item->facturas->nombre_completo_cliente) ? $item->facturas->nombre_completo_cliente : null,
            ['class' => 'form-control box-style yellow', 'id' => 'paciente', 'require', 'placeholder' => 'Nombre de Paciente'] ) }}
    </div>

    <div class="col-md-2 form-group  {{ $errors->has('edad') ? ' has-error' : '' }}">
        {{ Form::text('edad', isset($item->facturas->edad) ? $item->facturas->edad : null,
            ['class' => 'form-control box-style yellow', 'id' => 'edad', 'placeholder' => 'Edad']) }}
    </div>

    <div class="col-md-2 form-group  {{ $errors->has('sexo') ? ' has-error' : '' }}">
        {{ Form::text('sexo', isset($item->facturas->sexo) ? $item->facturas->sexo : null,
         ['class' => 'form-control box-style yellow', 'id' => 'sexo', 'placeholder' => 'Sexo']) }}
    </div>
</div>

<div class="row">
    <div class="col-md-3 form-group  {{ $errors->has('correo') ? ' has-error' : '' }}">
        {{ Form::email('correo', isset($item->facturas->correo) ? $item->facturas->correo : null,
            ['class' => 'form-control box-style yellow', 'id' => 'email', 'placeholder' => 'E-mail']) }}
    </div>

    <div class="col-md-3 form-group  {{ $errors->has('correo2') ? ' has-error' : '' }}">
        {{ Form::text('correo2', isset($item->facturas->correo2) ? $item->facturas->correo2 : null,
            ['class' => 'form-control box-style yellow', 'id' => 'email', 'placeholder' => 'E-mail 2']) }}
    </div>

    <div class="col-md-3 form-group  {{ $errors->has('direccion_entrega_sede') ? ' has-error' : '' }}">
        {{ Form::text('direccion_entrega_sede', isset($item->facturas->direccion_entrega_sede) ? $item->facturas->direccion_entrega_sede : null,
            ['class' => 'form-control box-style yellow', 'id' => 'direccion', 'require', 'placeholder' => 'Dirección de entrega']) }}
    </div>

    <div class="col-md-3 form-group  {{ $errors->has('medico') ? ' has-error' : '' }}">
        {!! Form::text('medico', isset($item->facturas->medico) ? $item->facturas->medico : null,
            ['class' => 'form-control box-style yellow', 'id' => 'medico', 'placeholder' => 'Medico']) !!}
    </div>
</div>