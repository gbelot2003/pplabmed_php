(function(){

    function getDate(date){

        const mydate = new Date(date);
        const a = moment(new Date());
        const b = moment(mydate);
        const years = a.diff(b, 'year');

        b.add(years, 'years');
        const months = a.diff(b, 'months');
        b.add(months, 'months');
        const days = a.diff(b, 'days');

        return years + ' años ' + months + ' meses ' + days + ' días';
    }

    $(document).ready(function () {
        $("#factura").focusout(function () {
            let id = $(this).val();
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
                CKEDITOR.instances['adendum'].insertHtml(data.body);
            });

    });


})(jQuery);
//# sourceMappingURL=citologias-form.js.map