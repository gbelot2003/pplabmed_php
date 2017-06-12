@if(isset($item))
<div class="col-md-12">
    <a class="btn btn-default" alt="Imagenes" data-toggle="modal" data-target="#ImagesModal"><span class="glyphicon glyphicon-plus"></span> Agregar Imagenes</a>
    <hr />
</div>

    @foreach($item->images->chunk(4) as $images)
    <div class="row">
            @foreach($images as $image)
            <div class="col-md-3 text-center imageCanvas">
                <a href="{{ route('images.edit', $image->id) }}">
                    <img id="{{ $image->id }}" class="img-responsive img-thumbnail image img-{{ $i ++ }}" src="/img/histo/{{ $image->image_url }}" alt="{{ $image->image_url }}" />
                </a>
            </div>
            @endforeach
    </div>
        <br>
    @endforeach
@endif
