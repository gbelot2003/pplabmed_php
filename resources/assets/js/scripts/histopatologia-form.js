
(function(){
    $.ajaxSetup({
        headers: {
            'X-XSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    function getDate(date){

        const mydate = new Date(date);
        const a = moment(new Date());
        const b = moment(mydate);
        const years = a.diff(b, 'year');

        b.add(years, 'years');
        const months = a.diff(b, 'months');
        b.add(months, 'months');
        const days = a.diff(b, 'days');

        if(years > 0){
            return years + ' A';
        } else {
            return months + ' M';
        }
    }

    $(document).ready(function () {
        $("#factura").focusout(function () {
            var id = $(this).val();
            //alert(id);
            $.get('/facturas/' + id)
                .done(function (data) {
                    console.log(data.nombre_completo_cliente);
                    $('#paciente').val(data.nombre_completo_cliente);

                    const fulldate =  getDate(data.fecha_nacimiento);

                    $('#edad').val(fulldate);
                    $('#edad2').val(fulldate);

                    $('#email').val(data.correo);

                    $('#direccion').val(data.direccion_entrega_sede);

                    $('#sexo').val(data.sexo);

                    $('#medico').val(data.medico);

                })
                .fail(function () {
                    alert('failure');
                })
        })
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

    $('#ImagesModal').on('shown.bs.modal', function (e) {
        // Initialize Dropzone
    });

    $('.colorbox').colorbox();

    $('.imageCanvas').each(function (ind, val){
        var x = 0, y = 0;

        let image   = $(this).find('.image');
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
        let className = '.'+arr[arr.length-1];
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

        $(btnSave).click(function(){
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
            }).done(function(response) {
                btnSave.hide();
                console.log(response);
            });
        });

        $(del).on('click',function(e){
            e.preventDefault();
            $(this).closest("div").remove();
            $.ajax({
                type: "get",
                url:"/histo/images/delete/" + id
            }).done(function(res){
                $(this).closest("div").remove();
                console.log('read')
            })
        })

    });

    $('#topog').inputmask("#.9999");

    document.addEventListener("keydown", function(event) {
        if(event.which === 107){
            console.log(event.which);
        }
    });

})(jQuery);