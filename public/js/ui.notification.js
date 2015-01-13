var UINotification = function(window){
    var show = function(type, message){
        notyfy({
            text: message,
            type: type,
            dismissQueue: true,
            layout: 'top',
            clickToHide: true,
            autoHide: true,
            autoHideDelay: 500
        });
    };
    return{
        show:show
    };
}(window);
