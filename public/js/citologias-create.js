!function(){function e(e){return items=[10326,10327,10328,10332,10333,10334,10335,10336],!!items.includes(e)}function a(e){return!(e.length&&e.length>0)&&(0===e.length||void 0)}$(document).ready(function(){$("#firma2_id").append($("<option>",{value:"none",text:"None",attr:"disabled"})),$(".dateclass").inputmask("##/##/####"),$("#factura").focus(),$("#factura").focusout(function(){var o=$(this).val();$.get("/facturas/"+o).done(function(o){return a(o)?($("#factura").val(""),$("#paciente").val(""),$("#edad").val(""),$("#edad2").val(""),$("#email").val(""),$("#direccion").val(""),$("#sexo").val(""),$("#medico").val(""),void alert("no hay datos")):e(o.examen.item)===!1?(""===$("#factura").val(),alert("Esta no es una Citologia")):($("#paciente").val(o.nombre_completo_cliente),$("#edad").val(o.edad),$("#email").val(o.correo),$("#direccion").val(o.direccion_entrega_sede),$("#sexo").val(o.sexo),void $("#medico").val(o.medico))}).fail(function(){alert("Problemas con el servidor"),$("#paciente").val(""),$("#edad").val(""),$("#edad2").val(""),$("#email").val(""),$("#direccion").val(""),$("#sexo").val(""),$("#medico").val("")})})}),document.addEventListener("keydown",function(e){113===e.which&&confirm("¿Seguro que desea salir?, se perdera toda la Información no salvada!!")&&(window.location.href="/citologias/create"),120==e.which&&$("#myForm").submit()})}(jQuery);