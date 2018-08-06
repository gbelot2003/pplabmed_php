<div class="row">
    {{--Serial--}}
    <div class="col-md-3 form-group {{ $errors->has('serial') ? ' has-error' : '' }}">
        <label>No. de Biopsia</label>
        {{ Form::hidden('id', $items->id)}}
        {{ Form::number('serial', isset($item->facturas->name) ? $item->facturas->name : null,
        ['class' => 'form-control box-style yellow', 'id' => 'serial', 'tabindex' => 1,'require', 'placeholder' => 'Serial'] ) }}
    </div>

    <div class="col-md-4">
        <label>Nombre</label>
        {{ Form::text('nombre', isset($item->nombre) ? $item->nombre: null, ['class' => 'form-control', 'id' => 'nombre']) }}
    </div>

    {{-- Firma 1 --}}
    <div class="col-md-4 form-group  {{ $errors->has('firma_id') ? ' has-error' : '' }}">
        <label>Firma</label>
        {{ Form::select('firma_id', $firmas, null, ['class' => 'form-control', 'tabindex' => 2]) }}
    </div>
</div>

<div class="row {{ $errors->has('informe') ? ' has-error' : '' }}">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            @foreach($plantillas as $plantilla)
                <li role="presentation"><a class="bt-insert" href="{{ $plantilla->id }}">{{ $plantilla->name }}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="col-md-12 form-group">
        {{ Form::textarea('body', null, ['class' => 'textarea form-control ckeditor', 'id' => 'informe', 'tabindex' => 3]) }}
    </div>
</div>

<div class="col-md-12">
    <div class="text-right">
        <br>
        <a class="btn btn-warning" href="/muestras/{{ $items->muestras->id }}/edit">Cancelar/Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-XSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

        $('a.bt-insert').click(function(e){
            e.preventDefault();
            const id = $(this).attr("href");
            $.get('/plantillas/info/' + id)
                .done(function(data){
                    console.log(data);
                    CKEDITOR.instances['informe'].insertHtml(data.body);
                });
        });
    });

</script>