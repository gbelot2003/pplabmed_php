<div class="row">
    <div class="col-md-5 col-md-push-1 form-group box-style">
        <label for="nombre">Nombre de Usuario</label>
        {!! Form::text('username', null, ['class' => 'form-control']) !!}
    </div>

    <div class="col-md-5 col-md-push-1 form-group box-style">
        <label for="email">Correo Electrónico</label>
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-5 col-md-push-1 form-group box-style">
        <label for="nombre">Contraseña</label>
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="col-md-5 col-md-push-1 form-group box-style">
        <label for="nombre">Repita Contraseña</label>
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
</div>


<div class="row">
    <div class="col-md-3 col-md-push-1 box-style">
        <label for="state">Estado</label>
        <br>
        <div class="control">
            {!! Form::checkbox('status', null , 1,
               [
               'data-toggle' => 'toggle',
               'data-on' => 'Activo',
               'data-off' => 'Desactivado',
               'class' => 'emiter'
               ])
            !!}
        </div>
        <div class="lcontrol">
            <span class="sing glyphicon"></span>
        </div>
    </div>

    <div class="col-md-7 col-md-push-1 box-style">
        <label for="roles">Rol</label>
        {!! Form::select('roles_lists[]', $roles, null, ['class' => 'form-control select2multiple '. 'multiple']) !!}
    </div>
</div>

<style type="text/css">
    .control{
        display: inline-block;
        position: relative;
    }

    .lcontrol {
        display: inline-block;
        position: absolute;
        padding: 0px 0px 6px 10px;
    }

    .select2{
        height: 2rem;
    }
</style>