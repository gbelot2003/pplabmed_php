<div class="row">
    <div class="col-md-5 col-md-push-1 form-group box-style">
        <label for="nombre">Código</label>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="col-md-5 col-md-push-1 form-group box-style">
        <label for="nombre">Nombre de Área</label>
        {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="col-md-10 col-md-push-1 form-group box-style">
        <label for="Description">Descripción del Rol</label>
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-push-1 form-group box-style">
        <label for="Description">Descripción del Rol</label>
        {!! Form::select('perms_lists[]', $perms, null, ['class' => 'form-control select2multiple', 'multiple']) !!}
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
</style>