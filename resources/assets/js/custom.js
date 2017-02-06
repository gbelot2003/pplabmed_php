(function(){
    $(function() {
        $('.datatable-area').dataTable({
            "language": {
                "decimal":        "",
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
                }
            }
        });
        $('.emiter').each(function() {
            $(this).on('change', function(){
                var id = $(this).val();
                var ch = $(this).is(':checked');

                if(ch === true){
                    var state = 1;
                    $.get('/areas/state/' + id + '/' + state, function (data) {
                        toastr.success('Has activado el permiso de <strong style="text-decoration: underline">' + data + '</strong> exitosamente!!')
                    });

                } else if(ch === false) {
                    var state = 0;
                    $.get('/areas/state/' + id + '/' + state, function (data) {
                        toastr.info('Has desactivado el permiso de <strong style="text-decoration: underline">' + data + '</strong> exitosamente!!')
                    });
                }
            })
        })
    })

})(jQuery);