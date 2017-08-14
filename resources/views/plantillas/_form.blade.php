<div class="row">
    <div class="col-md-10 col-md-push-1 form-group box-style">
        <label for="nombre">Nombre de Plantillas</label>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-push-1 form-group box-style">
        <label for="plantillaa">Plantillas</label>
        {!! Form::textarea('body', null, ['class' => 'form-control ckeditor']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-5 col-md-push-6 form-group box-style">
        <label for="tipo">Plantillas</label>
        {!! Form::select('type', ['1' => 'Biopsias', '2' => 'Certificados'], null, ['class' => 'form-control']) !!}
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
</div>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
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