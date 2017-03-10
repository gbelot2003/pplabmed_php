<div class="row">
    <div class="form-group col-md-2">
        <label>Numero Serial</label>
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
        <label for="factura">No. Factura</label>
        {{ Form::number('factura_id', isset($item->facturas->name) ? $item->facturas->name : null,
            ['class' => 'form-control box-style yellow', 'id' => 'factura', 'require'] ) }}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('factura_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="col-md-4 form-group  {{ $errors->has('nombre_completo_cliente') ? ' has-error' : '' }}">
        <label for="paciente">Paciente</label>
        {{ Form::text('nombre_completo_cliente', isset($item->facturas->nombre_completo_cliente) ? $item->facturas->nombre_completo_cliente : null,
            ['class' => 'form-control box-style yellow', 'id' => 'paciente', 'require'] ) }}
    </div>

    <div class="col-md-2 form-group  {{ $errors->has('edad') ? ' has-error' : '' }}">
        <label>Edad</label>
        {{ Form::text('edad', isset($item->facturas->edad) ? $item->facturas->edad : null,
            ['class' => 'form-control box-style yellow', 'id' => 'edad']) }}
    </div>

    <div class="col-md-2 form-group  {{ $errors->has('sexo') ? ' has-error' : '' }}">
        <label for="sexo">Sexo</label>
        {{ Form::text('sexo', isset($item->facturas->sexo) ? $item->facturas->sexo : null,
         ['class' => 'form-control box-style yellow', 'id' => 'sexo']) }}
    </div>
</div>

<div class="row">
    <div class="col-md-3 form-group  {{ $errors->has('correo') ? ' has-error' : '' }}">
        <label for="email">Correo Electrónico</label>
        {{ Form::email('correo', isset($item->facturas->correo) ? $item->facturas->correo : null,
            ['class' => 'form-control box-style yellow', 'id' => 'email']) }}
    </div>

    <div class="col-md-3 form-group  {{ $errors->has('correo2') ? ' has-error' : '' }}">
        <label for="email">Correo Electrónico 2</label>
        {{ Form::text('correo2', isset($item->facturas->correo2) ? $item->facturas->correo2 : null,
            ['class' => 'form-control box-style yellow', 'id' => 'email']) }}
    </div>

    <div class="col-md-3 form-group  {{ $errors->has('direccion_entrega_sede') ? ' has-error' : '' }}">
        <label for="direccion">Dirección de Entrega</label>
        {{ Form::text('direccion_entrega_sede', isset($item->facturas->direccion_entrega_sede) ? $item->facturas->direccion_entrega_sede : null,
            ['class' => 'form-control box-style yellow', 'id' => 'direccion', 'require']) }}
    </div>

    <div class="col-md-3 form-group  {{ $errors->has('medico') ? ' has-error' : '' }}">
        <label for="medico">Medico</label>
        {!! Form::text('medico', isset($item->facturas->medico) ? $item->facturas->medico : null,
            ['class' => 'form-control box-style yellow', 'id' => 'medico']) !!}
    </div>
</div>