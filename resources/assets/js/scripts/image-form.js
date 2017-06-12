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
    $("#descripcion").prop('disabled', true);

    function PostImage(resp, basic) {

        $.ajax({
            type: "put",
            url: "/histo/images/update/" + id,
            data: {
                '_token': crf,
                'images': resp,
                'descripcion': $('#descripcion').val(),
                'link_id': linkId,
                'name': name
            }
        }).done(function (response) {
            location.reload();
            basic.croppie('destroy');
        });
    }


    var linkId = $("#link_id").val();
    var name = $("#image_name").val();
    var id = $("#id").val();
    var crf = $('input[name="_token"]').val();
    var descripcion = $('#descripcion').val();

    $('#cortar').on('click', function(e){

        $(this).prop('disabled', true);
        $("#descripcion").prop('disabled', false);
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
            basic.croppie('result', {
                type: 'canvas',
                size: size
            }).then(function (resp) {
                PostImage(resp, basic);
                $(this).prop('disabled', false);
                $("#descripcion").prop('disabled', true);
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
        $("#descripcion").prop('disabled', false);
    });

    $("#gfiltros").on('click', function (e) {
        var canvas = $("#images2Cam");
        var dataUrl = canvas.get(0).toDataURL();


        $.ajax({
            type: "put",
            url: "/histo/images/update/" + id,
            data: {
                '_token': crf,
                'images': dataUrl,
                'descripcion': $('#descripcion').val(),
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
            $("#descripcion").prop('disabled', true);
            $(this).hide();
            $("#filtros").show();
        });
    });

    $("#brightness, #contrast, #saturation, #exposure").on('change', function () {
        var bright = $("#brightness").val();
        var contrastF = $("#contrast").val();
        var saturation = $("#saturation").val();
        var exposure = $("#exposure").val();
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

    $('#descripcion').on('change', function () {
        Caman("#images2Cam", function () {
            this.brightness(1);
        });
        $("#gfiltros").prop('disabled', false);
    })

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
