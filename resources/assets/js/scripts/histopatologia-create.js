(function () {
    $.ajaxSetup({
        headers: {
            'X-XSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    function getDate(date) {

        const mydate = new Date(date);
        const a = moment(new Date());
        const b = moment(mydate);
        const years = a.diff(b, 'year');

        b.add(years, 'years');
        const months = a.diff(b, 'months');
        b.add(months, 'months');
        const days = a.diff(b, 'days');

        if (years > 0) {
            return years + ' A';
        } else {
            return months + ' M';
        }
    }

    function checkItem(item) {

        items = [10321, 10328, 10332, 10333, 10334, 10335, 10336, 11576, 11577, 11578, 11579, 11580, 11581, 11582, 11583,11584,
            11585, 11586, 11587, 11588, 11589];
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

        $("#factura").focus();
        $("#factura").focusout(function () {
            var id = $(this).val();
            //alert(id);
            $.get('/facturas/' + id)
                .done(function (data) {

                    if (isEmptyObject(data)) {
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

                    if (checkItem(data.examen.item) === false) {
                        $("#factura").val() === "";
                        console.log(data.examen.item);
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

    $('a.bt-insert').click(function (e) {
        e.preventDefault();
        const id = $(this).attr("href");
        $.get('/plantillas/info/' + id)
            .done(function (data) {
                console.log(data);
                CKEDITOR.instances['informe'].insertHtml(data.body);
            });

    });

    $('#ImagesModal').on('shown.bs.modal', function (e) {
        // Initialize Dropzone
    });


    $('#topog').inputmask("#99.9");

    function save(text) {

        const serialize =  $("#myForm").serialize();

        $.ajax({
            method: "POST",
            url: "/histipatologiaApi/store",
            data: serialize,
        }).done(function (data) {
            console.log(data);
            toastr.success('La biopsia a sido salvada exitosamente!!', 'Registro Guardado');
            window.location = '/histopatologia/ '+ Number(data.id) + '/edit'
        }).fail(function (data) {
            console.log(data);
            toastr.error('El servidor dice:  ' +data.statusText, 'Status: ' + data.status + ' -- '+ data.responseText)
        });
    }

    $("#informe").ckeditor(function () {

// Once the editor is loaded, we can add custom commands

        /** Alt + A will alert a greeting message **/
        // First, we define our custom command
        this.addCommand('myGreetingCommand', {
            exec: function (editor, data) {
                save("inside");
            }
        });

        // Then, we set up the key combination
        this.keystrokeHandler.keystrokes[120 /* A */] = 'myGreetingCommand';

        /** Ctrl + B will alert a good bye message **/
        this.addCommand('myGoodByeCommand', {
            exec: function (editor, data) {
                save("inside!");
            }
        });

        this.keystrokeHandler.keystrokes[CKEDITOR.CTRL + 66 /* B */] = 'myGoodByeCommand';

    });

    document.addEventListener("keydown", function (event) {
        if (event.which == 120) {
            save("outside")
        }
    });

    $('#myForm').submit(function (e) {
        e.preventDefault();
        save("outside");

    })

})(jQuery);