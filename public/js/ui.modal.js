var UIModal = (function (window) {

    var $modal;

    var setModal = function (modal) {
        $modal = typeof modal !== 'undefined' ? $(modal) : $('#modal');
    };

    var getModal = function () {
        return $modal;
    };

    var showModal = function (button, context, modal) {
        $(context).on('click', button,function(event){
            event.preventDefault();
            console.log('clicked');
            $.get($(this).data('url'), function (data) {
                $(modal).html(data).modal('show');
            });
        });
    };

    return {
        init: function (modal) {
            setModal(modal);
        },
        showModal: showModal,
        $modal: getModal
    };
}(window));
