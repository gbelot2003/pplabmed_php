@if(isset($item))
<div class="col-md-12">
    <a class="btn btn-default" alt="Imagenes" data-toggle="modal" data-target="#ImagesModal"><span class="glyphicon glyphicon-plus"></span> Agregar Imagenes</a>
    <hr />
</div>

    @foreach($item->images->chunk(4) as $images)
    <div class="row">

            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>Imagen</th>
                        <th>Descripción</th>
                        <th>Orden</th>
                    </thead>
                    <tbody>
                    @foreach($images as $image)
                        <tr>
                            <td width="15%">
                                <a href="{{ route('images.edit', $image->id) }}">
                                    <img width="240" id="{{ $image->id }}" class="img-responsive img-thumbnail image img-{{ $i ++ }}" src="/img/histo/{{ $image->image_url }}" alt="{{ $image->image_url }}" />
                                </a>
                            </td>
                            <td width="85%">{{ $image->descripcion }}</td>
                            <td width="15%">
                               {{  $image->order  }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

    </div>
        <br>
    @endforeach
@endif
