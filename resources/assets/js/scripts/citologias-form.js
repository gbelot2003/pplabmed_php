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

        items = [10326, 10327, 10328, 10332, 10333, 10334, 10335, 10336];
        if (items.includes(item)) {
            return true;
        }
        else {
            return false;
        }
    }

    function isEmptyObject(obj) {

        if (obj.length && obj.length > 0)
            return false;

        if (obj.length === 0)
            return true;
    }

    $(document).ready(function () {

        $('#firma2_id').append($('<option>', {
            value: 'none',
            text: 'None',
            attr: 'disabled'
        }));

        $('.dateclass').inputmask("##/##/####");
        $("#factura").focus();
        $("#factura").focusout(function () {
            var id = $(this).val();
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
                        return alert('Esta no es una Citologia');
                    }

                    $('#paciente').val(data.nombre_completo_cliente);

                    const fulldate =  getDate(data.fecha_nacimiento);
                    console.log(fulldate);

                    $('#edad').val(fulldate);
                    $('#edad2').val(fulldate);

                    $('#email').val(data.correo);

                    $('#direccion').val(data.direccion_entrega_sede);

                    $('#sexo').val(data.sexo);

                    $('#medico').val(data.medico);

                })
                .fail(function () {
                    alert("Problemas con el servidor");
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
                CKEDITOR.instances['adendum'].insertHtml(data.body);
            });

    });

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