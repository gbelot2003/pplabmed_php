@if(isset($item))
<div class="col-md-12">
    <a class="btn btn-default" alt="Imagenes" data-toggle="modal" data-target="#ImagesModal"><span class="glyphicon glyphicon-plus"></span> Agregar Imagenes</a>
    <hr />
</div>

<div class="row">
        @foreach($item->images as $image)
        <div class="col-md-4 text-center imageCanvas">
            <a href="#" style="display: block" class="delete text-right"><i class="glyphicon glyphicon-remove"></i></a>
            <a href="/img/histo/{{ $image->image_url }}" class="colorbox">
                <img id="{{ $image->id }}" class="img-responsive img-thumbnail image img-{{ $i ++ }}" src="/img/histo/{{ $image->image_url }}" alt="{{ $image->image_url }}" />
            </a>
            <a id="changePlus" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
            <a id="changeLess" class="btn btn-primary"><i class="glyphicon glyphicon-minus"></i></a>
            |
            <a id="changeSave" class="btn btn-primary"><i class="glyphicon glyphicon-cloud-upload"></i></a>
        </div>
        @endforeach
</div>
@endif
