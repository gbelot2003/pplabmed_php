!function(){function e(e){const n=new Date(e),o=moment(new Date),a=moment(n),t=o.diff(a,"year");a.add(t,"years");const i=o.diff(a,"months");a.add(i,"months");o.diff(a,"days");return t>0?t+" A":i+" M"}$.ajaxSetup({headers:{"X-XSRF-TOKEN":$('input[name="_token"]').val()}}),$(document).ready(function(){$("#factura").focusout(function(){var n=$(this).val();$.get("/facturas/"+n).done(function(n){$("#paciente").val(n.nombre_completo_cliente);const o=e(n.fecha_nacimiento);$("#edad").val(o),$("#edad2").val(o),$("#email").val(n.correo),$("#direccion").val(n.direccion_entrega_sede),$("#sexo").val(n.sexo),$("#medico").val(n.medico)}).fail(function(){alert("failure")})})}),$("a.bt-insert").click(function(e){e.preventDefault();const n=$(this).attr("href");$.get("/plantillas/info/"+n).done(function(e){CKEDITOR.instances.informe.insertHtml(e.body)})}),$("#ImagesModal").on("shown.bs.modal",function(e){}),$(".colorbox").colorbox(),$("#topog").inputmask("#.9999"),document.addEventListener("keydown",function(e){107===e.which&&confirm("¿Seguro que desea salir?, se perdera toda la Información no salvada!!")&&(window.location.href="/citologias/create"),e.ctrlKey===!0&&13==e.which&&$("#myForm").submit()})}(jQuery);