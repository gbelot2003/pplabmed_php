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

        if(years > 0){
            return years + ' A';
        } else {
            return months + ' M';
        }
    }

    function checkItem(item){

        items = [10328, 10328, 10332, 10333, 10334, 10335, 10336, 10337];
        if (items.includes(item)) {
            return true;
        }
        else {
            return false;
        }
    }

    $(document).ready(function () {

        $("#factura").focusout(function () {
            var id = $(this).val();
            //alert(id);
            $.get('/facturas/' + id)
                .done(function (data) {
                    console.log(data.examen.item);
                    if(checkItem(data.examen.item) === false){
                        $("#factura").val() === "";
                        return alert('Esta no es una Citologia');
                    }

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

    document.addEventListener("keydown", function(event) {
        if(event.which === 107){
            if (confirm('¿Seguro que desea salir?, se perdera toda la Información no salvada!!')) {
                window.location.href = '/Citologias/create';
            }
        }

        if(event.ctrlKey === true && event.which == 13)
        {
            $( "#myForm" ).submit();
        }
    });



})(jQuery);
//# sourceMappingURL=Citologias-form.js.map
