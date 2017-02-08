<fieldset>

    <hr class="white-hr">

    <div class="row">

        <div class="form-group col-md-2 box-style">
            <label for="DetCancer">Detección de Cancer</label>
            {!! Form::checkbox('DetCancer') !!}
        </div>

        <div class="form-group col-md-2 box-style">
            <label for="IndMaduracion">Indice de Maduración</label>
            {!! Form::checkbox('IndMaduracion') !!}
        </div>

        <div class="form-group col-md-8 box-style">
            <label for="edad">Otros</label>
            {!! Form::text('otros', null, ['class' => 'form-control']) !!}
        </div>

    </div>
    <div class="row">
        <div class="form-group col-md-12 box-style">
            <label for="diagnostico">Diagnostico Clínico</label>
            {!! Form::textarea('diagnostico', null, ['class' => 'form-control ckeditor']) !!}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4 box-style">
            <label for="edad">F.U.R.</label>
            {!! Form::text('fur', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-4 box-style">
            <label for="edad">F.U.P.</label>
            {!! Form::text('fup', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-4 box-style">
            <label for="edad">Gravidad</label>
            {!! Form::text('gravidad', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
        </div>

        <div class="form-group col-md-4 box-style">
            <label for="edad">Para</label>
            {!! Form::text('para', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-4 box-style">
            <label for="edad">Abortos</label>
            {!! Form::number('abortos', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12 box-style">
            <label for="informe">Informe</label>
            {!! Form::textarea('informe', null, ['class' => 'form-control ckeditor']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="text-right">
                <a class="btn btn-danger" href="{{ action('CitologiaController@index') }}">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
</fieldset>