var UIButton = (function () {

    var ajaxButton = function (context, button) {
        var url,method,token;
        $(context).on('click', button, function (event) {
            console.log('hola');            event.preventDefault();
            ajaxCall($(this).data('url'), $(this).data('method'));
        });
    };

    var confirmationButton = function(context, button){
        $(context).on('click', button, function (event) {
            event.preventDefault();
            var url = $(this).data('url');
            var method = $(this).data('method');
            var token = $(this).data('token');

            bootbox.confirm("<h4>¿Are you sure that you want to perform this action?</h4>", function(result) {
                ajaxCall(url, method, token);
            });
        });
    };

    var ajaxCall = function(url, method){
        $.ajax({
            url: url,
            type: method,
            data:{},
            dataType: 'json',
            success: function (data) {

            }
        });
    };



    return {
        ajaxButton: ajaxButton,
        confirmationButton:confirmationButton
    }
}());
