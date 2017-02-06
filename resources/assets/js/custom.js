(function(){
    var selector = $("#selector1");
    var url = (selector.val());


    $(function() {
        $('.datatable-area').dataTable({
            "ordering": true,
            "fnDrawCallback": function(){
                $('.toggle .emiter').on('change', function(){
                    var id = $(this).val();
                    var ch = $(this).is(':checked');
                    sendDataToServer(id, ch, url);
                });
            },
            "order": [[0, 'desc']],
            "language": {
                "emptyTable":     "No hay datos disponibles para esta tabla",
                "info":           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                "infoEmpty":      "Mostrando 0 a 0 de 0 entradas",
                "infoFiltered":   "(Filtrando desde _MAX_ total de entradas)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Mostrando _MENU_ entradas",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "search":         "Buscar:",
                "zeroRecords":    "No hay coincidencias",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "aria": {
                    "sortAscending":  ": Ordenando por columnas asendente",
                    "sortDescending": ": Ordenando por columnas desendente"
                },
            }
        });

        function sendDataToServer(id, ch, selector){
            if(ch === true){
                var state = 1;
                $.get('/' + selector + '/' + id + '/' + state)
                    .done(function(data){
                    toastr.success('Has activado el permiso de <strong style="text-decoration: underline">' + data + '</strong> exitosamente!!');
                }).fail(function(data){
                    var status = data.status;
                    var statusText = data.statusText;
                    toastr.error(`Hubo algun problema, el servidor tiene "Status:" ${status}, mensaje de error es: ${statusText}`);
                });

            } else if(ch === false) {
                var state = 0;
                $.get('/' + selector + '/' + id + '/' + state)
                .done(function(data){
                    toastr.info('Has desactivado el permiso de <strong style="text-decoration: underline">' + data + '</strong> exitosamente!!');
                }).fail(function(data){
                    var status = data.status;
                    var statusText = data.statusText;
                    toastr.error(`Hubo algun problema, el servidor tiene "Status:" ${status}, mensaje de error es: ${statusText}. Los cambios no se salvaron`);
                });
            }
        }

        $('.select2multiple').select2({
            multiple: true
        });
    })

})(jQuery);