!function(){function a(a){return items=[10326,10327,10328,10332,10333,10334,10335,10336],!!items.includes(a)}function e(a){return!(a.length&&a.length>0)&&(0===a.length||void 0)}$(document).ready(function(){$("#firma2_id").append($("<option>",{value:"none",text:"None",attr:"disabled"})),$(".dateclass").inputmask("##/##/####"),$("#factura").focusout(function(){var o=$(this).val();$.get("/facturas/"+o).done(function(o){return e(o)?($("#factura").val(""),$("#paciente").val(""),$("#edad").val(""),$("#edad2").val(""),$("#email").val(""),$("#direccion").val(""),$("#sexo").val(""),$("#medico").val(""),void alert("no hay datos")):a(o.examen.item)===!1?(""===$("#factura").val(),alert("Esta no es una Citologia")):($("#paciente").val(o.nombre_completo_cliente),$("#edad").val(fulldate),$("#edad2").val(fulldate),$("#email").val(o.correo),$("#direccion").val(o.direccion_entrega_sede),$("#sexo").val(o.sexo),void $("#medico").val(o.medico))}).fail(function(){alert("Problemas con el servidor"),$("#paciente").val(""),$("#edad").val(""),$("#edad2").val(""),$("#email").val(""),$("#direccion").val(""),$("#sexo").val(""),$("#medico").val("")})})}),document.addEventListener("keydown",function(a){113===a.which&&confirm("¿Seguro que desea salir?, se perdera toda la Información no salvada!!")&&(window.location.href="/citologias/create"),120==a.which&&$("#myForm").submit()});$(window).scroll(function(){window_y=$(window).scrollTop(),scroll_critical=120,window_y>scroll_critical?$("#navTag").show("slow"):$("#navTag").hide("slow")})}(jQuery);