$(document).ready(function() {
    $('.datatable-area').DataTable({});
    $('.switch').switchy();

    var actualState = $('.switch').val();
    console.log(actualState);

    $('.switch').on('change', function(){
        var value = $(this).val();
        var bgColor = '#ccb3dc';
        if(value === "1"){
            $('.switchy-bar').css("background", "blue");
        } else if(value === "0") {
            $('.switchy-bar').css("background", "red");
        }
    });
});

