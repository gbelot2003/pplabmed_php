/*
 Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
*/
(function(a){if("undefined"==typeof a)throw Error("jQuery should be loaded before CKEditor jQuery adapter.");if("undefined"==typeof CKEDITOR)throw Error("CKEditor should be loaded before CKEditor jQuery adapter.");CKEDITOR.config.jqueryOverrideVal="undefined"==typeof CKEDITOR.config.jqueryOverrideVal?!0:CKEDITOR.config.jqueryOverrideVal;a.extend(a.fn,{ckeditorGet:function(){var a=this.eq(0).data("ckeditorInstance");if(!a)throw"CKEditor is not initialized yet, use ckeditor() with a callback.";return a},
ckeditor:function(g,d){if(!CKEDITOR.env.isCompatible)throw Error("The environment is incompatible.");if(!a.isFunction(g)){var m=d;d=g;g=m}var k=[];d=d||{};this.each(function(){var b=a(this),c=b.data("ckeditorInstance"),f=b.data("_ckeditorInstanceLock"),h=this,l=new a.Deferred;k.push(l.promise());if(c&&!f)g&&g.apply(c,[this]),l.resolve();else if(f)c.once("instanceReady",function(){setTimeout(function(){c.element?(c.element.$==h&&g&&g.apply(c,[h]),l.resolve()):setTimeout(arguments.callee,100)},0)},
null,null,9999);else{if(d.autoUpdateElement||"undefined"==typeof d.autoUpdateElement&&CKEDITOR.config.autoUpdateElement)d.autoUpdateElementJquery=!0;d.autoUpdateElement=!1;b.data("_ckeditorInstanceLock",!0);c=a(this).is("textarea")?CKEDITOR.replace(h,d):CKEDITOR.inline(h,d);b.data("ckeditorInstance",c);c.on("instanceReady",function(d){var e=d.editor;setTimeout(function(){if(e.element){d.removeListener();e.on("dataReady",function(){b.trigger("dataReady.ckeditor",[e])});e.on("setData",function(a){b.trigger("setData.ckeditor",
[e,a.data])});e.on("getData",function(a){b.trigger("getData.ckeditor",[e,a.data])},999);e.on("destroy",function(){b.trigger("destroy.ckeditor",[e])});e.on("save",function(){a(h.form).submit();return!1},null,null,20);if(e.config.autoUpdateElementJquery&&b.is("textarea")&&a(h.form).length){var c=function(){b.ckeditor(function(){e.updateElement()})};a(h.form).submit(c);a(h.form).bind("form-pre-serialize",c);b.bind("destroy.ckeditor",function(){a(h.form).unbind("submit",c);a(h.form).unbind("form-pre-serialize",
c)})}e.on("destroy",function(){b.removeData("ckeditorInstance")});b.removeData("_ckeditorInstanceLock");b.trigger("instanceReady.ckeditor",[e]);g&&g.apply(e,[h]);l.resolve()}else setTimeout(arguments.callee,100)},0)},null,null,9999)}});var f=new a.Deferred;this.promise=f.promise();a.when.apply(this,k).then(function(){f.resolve()});this.editor=this.eq(0).data("ckeditorInstance");return this}});CKEDITOR.config.jqueryOverrideVal&&(a.fn.val=CKEDITOR.tools.override(a.fn.val,function(g){return function(d){if(arguments.length){var m=
this,k=[],f=this.each(function(){var b=a(this),c=b.data("ckeditorInstance");if(b.is("textarea")&&c){var f=new a.Deferred;c.setData(d,function(){f.resolve()});k.push(f.promise());return!0}return g.call(b,d)});if(k.length){var b=new a.Deferred;a.when.apply(this,k).done(function(){b.resolveWith(m)});return b.promise()}return f}var f=a(this).eq(0),c=f.data("ckeditorInstance");return f.is("textarea")&&c?c.getData():g.call(f)}}))})(window.jQuery);
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
        console.log(item);
        items = [10328, 10328, 10332, 10333, 10334, 10335, 10336, 11576, 11577, 11578, 11579, 11580, 11581, 11582, 11583,11584,
            11585, 11586, 11587, 11588, 11589, 10327];
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

                    //console.log(data.examen);
                    if (checkItem(data.examen.item) === false) {
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
//# sourceMappingURL=histopatologia-create.js.map
