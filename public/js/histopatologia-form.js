!function(){function e(e){const n=new Date(e),a=moment(new Date),o=moment(n),t=a.diff(o,"year");o.add(t,"years");const i=a.diff(o,"months");o.add(i,"months");a.diff(o,"days");return t>0?t+" A":i+" M"}function n(e){return items=[10328,10328,10332,10333,10334,10335,10336],!items.includes(e)}$.ajaxSetup({headers:{"X-XSRF-TOKEN":$('input[name="_token"]').val()}}),$(document).ready(function(){$("#factura").focusout(function(){var a=$(this).val();$.get("/facturas/"+a).done(function(a){if(n(a.examen.item)===!1)return""===$("#factura").val(),alert("Esta no es una Biopsia");$("#paciente").val(a.nombre_completo_cliente);const o=e(a.fecha_nacimiento);$("#edad").val(o),$("#edad2").val(o),$("#email").val(a.correo),$("#direccion").val(a.direccion_entrega_sede),$("#sexo").val(a.sexo),$("#medico").val(a.medico)}).fail(function(){alert("failure")})})}),$("a.bt-insert").click(function(e){e.preventDefault();const n=$(this).attr("href");$.get("/plantillas/info/"+n).done(function(e){CKEDITOR.instances.informe.insertHtml(e.body)})}),$("#ImagesModal").on("shown.bs.modal",function(e){}),$(".colorbox").colorbox(),$("#topog").inputmask("#99.9"),document.addEventListener("keydown",function(e){107===e.which&&confirm("¿Seguro que desea salir?, se perdera toda la Información no salvada!!")&&(window.location.href="/citologias/create"),121==e.which&&$("#myForm").submit()})}(jQuery);