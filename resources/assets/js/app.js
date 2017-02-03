(function ($) {
    $('.datatable-area').DataTable();
    $('#dimension-switch').bootstrapSwitch('setSizeClass', '');
    $('.form-control').on("click paste", function(event){
        $('#dimension-switch').each( function(){
            if ( ! $(this).bootstrapSwitch('state')) { //check if is not checked
                $(this).bootstrapSwitch('toggleState'); //change the checkbox state
            }
        });
    });
})(jQuery);