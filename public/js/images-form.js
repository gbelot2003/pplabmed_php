(function () {
    $.ajaxSetup({
        headers: {
            'X-XSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    $("#brightness").prop('disabled', true);
    $("#contrast").prop('disabled', true);
    $("#saturation").prop('disabled', true);
    $("#exposure").prop('disabled', true);

    function PostImage(resp, basic) {
        let descripcion = $('#descripcion').val();
        $.ajax({
            type: "put",
            url: "/histo/images/update/" + id,
            data: {
                '_token': crf,
                'images': resp,
                'descripcion': descripcion,
                'link_id': linkId,
                'name': name
            }
        }).done(function (response) {
            location.reload();
            basic.croppie('destroy');
        });
    }

    let url = $("#images2Cam").attr('src');

    let linkId = $("#link_id").val();
    let name = $("#image_name").val();
    let id = $("#id").val();
    let crf = $('input[name="_token"]').val();
    let descripcion = $('#descripcion').val();

    $('#cortar').on('click', function(e){

        $(this).prop('disabled', true);
        $("#filtros").hide();

        $('#gcortar').show();
        var basic = $('#images2Cam').croppie({
            viewport: {
                width: 500,
                height: 400
            }
        });

        $("#gcortar").on('click', function () {

            size = 'viewport';
            console.log(descripcion);
            basic.croppie('result', {
                type: 'canvas',
                size: size
            }).then(function (resp) {
                PostImage(resp, basic);
                $(this).prop('disabled', false);
            });


        })
    });


    $('#filtros').on('click', function (e) {
        $("#brightness").prop('disabled', false);
        $("#contrast").prop('disabled', false);
        $("#saturation").prop('disabled', false);
        $("#exposure").prop('disabled', false);
        $("#cortar").prop('disabled', true);
        $(this).hide();
        $("#gfiltros").show();
        $("#gfiltros").prop('disabled', true);
    });

    $("#gfiltros").on('click', function (e) {
        let canvas = $("#images2Cam");
        let dataUrl = canvas.get(0).toDataURL();

        $.ajax({
            type: "put",
            url: "/histo/images/update/" + id,
            data: {
                '_token': crf,
                'images': dataUrl,
                'descripcion': descripcion,
                'link_id': linkId,
                'name': name
            }
        }).done(function (response) {
            location.reload();
            $("#brightness").prop('disabled', true);
            $("#contrast").prop('disabled', true);
            $("#saturation").prop('disabled', true);
            $("#exposure").prop('disabled', true);
            $("#cortar").prop('disabled', false);
            $(this).hide();
            $("#filtros").show();
        });
    });

    $("#brightness, #contrast, #saturation, #exposure").on('change', function () {
        let bright = $("#brightness").val();
        let contrastF = $("#contrast").val();
        let saturation = $("#saturation").val();
        let exposure = $("#exposure").val();
        $("#gfiltros").prop('disabled', false);

        $('#brightnessValue').text(bright);
        $('#contrastValue').text(contrastF);
        $('#saturationValue').text(saturation);
        $('#exposureValue').text(exposure);

        Caman("#images2Cam", function () {
            this.revert(false);

            this.brightness(parseInt(bright));
            this.newLayer(function (){
                this.setBlendingMode('multiply');
                this.copyParent();
                this.filter.contrast(parseInt(contrastF));
                this.filter.saturation(saturation);
                this.filter.exposure(exposure);

            });

            this.render(function () {
                console.log('done')
            });
        });
    });

/*

 $("#contrast").change(function () {
        let vars = $(this).val();
        $("#b_meter").text(vars);
        Caman("#images2Cam", function () {
            this.revert();
            this.contrast(vars);
            this.render();
        });
    });

    $("#saturacion").change(function () {
        let vars = $(this).val();
        $("#c_meter").text(vars);
    })*/
})(jQuery);
/*
(function () {
    $('.imageCanvas').each(function (ind, val) {
        var x = 0, y = 0;

        let image = $(this).find('.image');
        let btnPlus = $(this).find('#changePlus');
        let btnLess = $(this).find('#changeLess');
        let btnSave = $(this).find('#changeSave');
        let crf = $('input[name="_token"]').val();
        let del = $(this).find('.delete');

        let id = image.prop('id');
        let name = image.prop('alt');
        console.log('id-' + id);


        let classList = image.attr('class');
        let arr = classList.split(' ');
        let className = '.' + arr[arr.length - 1];
        console.log(className);

        $(btnPlus).click(function (e) {
            e.preventDefault();
            btnSave.show();
            y = (x + 5);

            Caman(className, function () {
                this.brightness(y);
                this.render();
            });
        });

        $(btnLess).click(function (e) {
            e.preventDefault();
            btnSave.show();
            y = (x - 5);

            Caman(className, function () {
                this.brightness(y);
                this.render();
            });
        });

        $(btnSave).click(function (e) {
            e.preventDefault();
            let canvas = $(className);
            let dataUrl = canvas.get(0).toDataURL();
            let linkId = $('input[name="link_id"]').val();

            $.ajax({
                type: "put",
                url: "/histo/images/update/" + id,
                data: {
                    '_token': crf,
                    'images': dataUrl,
                    'link_id': linkId,
                    'name': name
                }
            }).done(function (response) {
                btnSave.hide();
                console.log(response);
            });
        });

        $(del).on('click', function (e) {
            e.preventDefault();
            $(this).closest("div").remove();
            $.ajax({
                type: "get",
                url: "/histo/images/delete/" + id
            }).done(function (res) {
                $(this).closest("div").remove();
                console.log('read')
            })
        })

    });
})(jQuery);*/

//# sourceMappingURL=images-form.js.map
