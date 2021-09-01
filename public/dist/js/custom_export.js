$( document ).ready(function() {
            console.log('conexion custom_export');
            $(".export").click(function() {
            var export_type = $(this).data('export-type');
            $('#data_table').tableExport({
            type : export_type,
            escape : 'false',
            ignoreColumn: []
            });
        });
    });