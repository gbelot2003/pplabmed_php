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