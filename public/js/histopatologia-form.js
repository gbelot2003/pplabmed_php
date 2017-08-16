
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

    function checkItem(item){

        items = [10328, 10328, 10332, 10333, 10334, 10335, 10336];
        if (items.includes(item)) {
            return false;
        }
        else {
            return true;
        }
    }

    function isEmptyObject(obj) {

        if (obj.length && obj.length > 0)
            return false;

        if (obj.length === 0)
            return true;
    }

    $(document).ready(function () {
        $('.dateclass').inputmask("##/##/####");

        $('#firma2_id').append($('<option>', {
            value: 'none',
            text: 'None',
            attr: 'disabled'
        }));

        $("#factura").focusout(function () {
            var id = $(this).val();
            //alert(id);
            $.get('/facturas/' + id)
                .done(function (data) {

                    if (isEmptyObject(data)){
                        alert("no hay datos");
                        $('#factura').val("");
                        $('#paciente').val("");
                        $('#edad').val("");
                        $('#edad2').val("");
                        $('#email').val("");
                        $('#direccion').val("");
                        $('#sexo').val("");
                        $('#medico').val("");
                        return;
                    }

                    if(checkItem(data.examen.item) === false){
                        $("#factura").val() === "";
                        return alert('Esta no es una Biopsia');
                    }

                    $('#paciente').val(data.nombre_completo_cliente);

                    $('#edad').val(data.edad);

                    $('#email').val(data.correo);

                    $('#direccion').val(data.direccion_entrega_sede);

                    $('#sexo').val(data.sexo);

                    $('#medico').val(data.medico);

                })
                .fail(function () {
                    alert("Problemas con el servidor");
                    $('#factura').val("");
                    $('#paciente').val("");
                    $('#edad').val("");
                    $('#edad2').val("");
                    $('#email').val("");
                    $('#direccion').val("");
                    $('#sexo').val("");
                    $('#medico').val("");
                    return;
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

    $('#topog').inputmask("#99.9");

    document.addEventListener("keydown", function(event) {
        if(event.which === 113){
            if (confirm('¿Seguro que desea salir?, se perdera toda la Información no salvada!!')) {
                window.location.href = '/citologias/create';
            }
        }

        if(event.which == 120)
        {
            $( "#myForm" ).submit();
        }
    });

})(jQuery);
(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function isEmptyObject(obj) {

        if (obj.length && obj.length > 0)
            return false;

        if (obj.length === 0)
            return true;
    }

    jQuery(document).ready(function () {

        $('#editModalBtn').on('click',function(){
            $('#myModal').modal();

            var id = $(this).attr('rel');

            $.get('/facturas/' + id)
                .done(function (data) {

                    if (isEmptyObject(data)) {
                        $('#m_factura').val("");
                        $('#m_paciente').val("");
                        $('#m_edad').val("");
                        $('#m_email').val("");
                        $('#m_direccion').val("");
                        $('#m_sexo').val("");
                        $('#m_medico').val("");
                        alert("no hay datos");
                        return;
                    }

                    $('#m_factura').val(data.num_factura);

                    $('#m_paciente').val(data.nombre_completo_cliente);

                    $('#m_edad').val(data.edad);

                    $('#m_email').val(data.correo);

                    $('#m_direccion').val(data.direccion_entrega_sede);

                    $('#m_sexo').val(data.sexo);

                    $('#m_medico').val(data.medico);
                });
        });

        $("#formFactura").submit(function (e) {
            e.preventDefault();
            var id = $('#m_factura').val();

            $.ajax({
                type: "PUT",
                url: "/facturas/" + id,
                data: $(this).serialize(), // serializes the form's elements.
            }).done(function(data){
                $('#myModal').modal('hide');
                $('#paciente').val(data.nombre_completo_cliente);
                $('#edad').val(data.edad);
                $('#email').val(data.correo);
                $('#direccion').val(data.direccion_entrega_sede);
                $('#sexo').val(data.sexo);
                $('#medico').val(data.medico);

            }).fail(function(data){
                alert('error al salvar información' + data);
            });

        });

        $('#duplicateBtn').on('click', function () {
            $('#repeatFactura').modal();
        })
    })

})(jQuery);
//# sourceMappingURL=histopatologia-form.js.map
