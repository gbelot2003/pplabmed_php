!function(){function a(a){return items=[10328,10328,10332,10333,10334,10335,10336],!items.includes(a)}function e(a){return!(a.length&&a.length>0)&&(0===a.length||void 0)}$.ajaxSetup({headers:{"X-XSRF-TOKEN":$('input[name="_token"]').val()}}),$(document).ready(function(){$(".dateclass").inputmask("##/##/####"),$("#firma2_id").append($("<option>",{value:"none",text:"None",attr:"disabled"})),$("#factura").focus(),$("#factura").focusout(function(){var t=$(this).val();$.get("/facturas/"+t).done(function(t){return e(t)?(alert("no hay datos"),$("#factura").val(""),$("#paciente").val(""),$("#edad").val(""),$("#edad2").val(""),$("#email").val(""),$("#direccion").val(""),$("#sexo").val(""),void $("#medico").val("")):a(t.examen.item)===!1?(""===$("#factura").val(),alert("Esta no es una Biopsia")):($("#paciente").val(t.nombre_completo_cliente),$("#edad").val(t.edad),$("#email").val(t.correo),$("#direccion").val(t.direccion_entrega_sede),$("#sexo").val(t.sexo),void $("#medico").val(t.medico))}).fail(function(){alert("Problemas con el servidor"),$("#factura").val(""),$("#paciente").val(""),$("#edad").val(""),$("#edad2").val(""),$("#email").val(""),$("#direccion").val(""),$("#sexo").val(""),$("#medico").val("")})})}),$("a.bt-insert").click(function(a){a.preventDefault();const e=$(this).attr("href");$.get("/plantillas/info/"+e).done(function(a){CKEDITOR.instances.informe.insertHtml(a.body)})}),$("#ImagesModal").on("shown.bs.modal",function(a){}),$(".colorbox").colorbox(),$("#topog").inputmask("#99.9"),$("#submit").attr("disabled",!0),$("#topog").keyup(function(){0!=$(this).val().length?$("#submit").attr("disabled",!1):$("#submit").attr("disabled",!0)}),document.addEventListener("keydown",function(a){113===a.which&&confirm("¿Seguro que desea salir?, se perdera toda la Información no salvada!!")&&(window.location.href="/citologias/create"),120==a.which&&(alert("#rasdf"),$("#myForm").submit())})}(jQuery);