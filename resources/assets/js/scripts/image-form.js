/*(function(){
    $('.imageCanvas').each(function (ind, val){
        var x = 0, y = 0;

        let image   = $(this).find('.image');
        let btnPlus = $(this).find('#changePlus');
        let btnLess = $(this).find('#changeLess');
        let btnSave = $(this).find('#changeSave');
        let crf = $('input[name="_token"]').val();
        let del = $(this).find('.delete');

        let id = image.prop('id');
        let name = image.prop('alt');
        console.log('id-' + id);


        let classList = image.attr('class');
        let arr = classList.split(' ');
        let className = '.'+arr[arr.length-1];
        console.log(className);

        $(btnPlus).click(function (e) {
            e.preventDefault();
            btnSave.show();
            y = (x + 5);

            Caman(className, function () {
                this.brightness(y);
                this.render();
            });
        });

        $(btnLess).click(function (e) {
            e.preventDefault();
            btnSave.show();
            y = (x - 5);

            Caman(className, function () {
                this.brightness(y);
                this.render();
            });
        });

        $(btnSave).click(function(e){
            e.preventDefault();
            let canvas = $(className);
            let dataUrl = canvas.get(0).toDataURL();
            let linkId = $('input[name="link_id"]').val();

            $.ajax({
                type: "put",
                url: "/histo/images/update/" + id,
                data: {
                    '_token': crf,
                    'images': dataUrl,
                    'link_id': linkId,
                    'name': name
                }
            }).done(function(response) {
                btnSave.hide();
                console.log(response);
            });
        });

        $(del).on('click',function(e){
            e.preventDefault();
            $(this).closest("div").remove();
            $.ajax({
                type: "get",
                url:"/histo/images/delete/" + id
            }).done(function(res){
                $(this).closest("div").remove();
                console.log('read')
            })
        })

    });
})(jQuery);*/
(function(){

})(jQuery);

