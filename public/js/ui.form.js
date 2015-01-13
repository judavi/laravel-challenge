var UIForm = function () {
    var isAjaxForm = Boolean(false);
    var $form;
    var _toShow;

    var setForm = function (form, ajax) {
        $form = typeof form !== 'undefined' ? $(form) : $('form');
        isAjaxForm = typeof ajax !== 'undefined' ? Boolean(ajax) : fØalse;
    };

    var getForm = function () {
        return $form;
    };

    var setErrors = function (errors) {
        var message = '<ul>';
        $(errors).each(function (index, val) {
            message += '<li>' + val + '</li>';
        });
        message += '</ul>';

        return message;

    };

    var validate = function (rules, messages) {
        $.validator.addMethod("valueNotEquals", function (value, element, arg) {
            return arg != value;
        });

        $.validator.addMethod("alpha", function (value, element) {
            return this.optional(element) || value === value.match(/^[a-zA-Z\s]+$/);
        });
        $.validator.addMethod("twitter_username", function(value, element){
            if(value == "") return true;
            var pattern = /^\w{1,32}$/;
            var result = pattern.test(value);
            return result;
        }, "Twitter handle only - no spaces, @, and not a URL.");


        $form.validate({
            rules: rules,
            messages: messages,
            submitHandler: function (form) {
                if (isAjaxForm) {
                    $.ajax({
                        type: $(form).prop('method'),
                        url: $(form).prop('action'),
                        data: $(form).serialize(),
                        dataType: 'json',
                        success: function (data) {

                            if (Boolean(data.success)) {
                                location.replace(data.url);
                            } else {
                                console.log(data);
                                var m = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>';
                                $.each(data.errors, function (i, item) {
                                    m += '<p>' + data.errors[i][0] + '</p>';
                                });
                                m += '</div>';

                                $(m).insertBefore($form);
                            }
                        }
                    });
                } else {
                    console.log('Vamos a enviar el formulario');
                    form.submit();
                }
            },
            showErrors: function (map, list) {
                this.currentElements.parents('label:first, div:first').find('.has-error').remove();
                this.currentElements.parents('.form-group:first').removeClass('has-error');

                $.each(list, function (index, error) {
                    var ee = $(error.element);
                    var eep = ee.parents('label:first').length ? ee.parents('label:first') : ee.parents('div:first');

                    ee.parents('.form-group:first').addClass('has-error');
                    eep.find('.has-error').remove();
                    eep.append('<p class="has-error help-block">' + error.message + '</p>');
                });
            }
        });

    };


    var selectWithValue = function (el, val) {
        $(el).selectpicker('val', val);
    };


    var toShow = function () {
        return _toShow;
    };

    return {
        init: function (form, ajax, modal) {
            setForm(form, ajax);
            _modal = modal;
        },
        validate: validate,
        selectWithValue: selectWithValue,
        toShow: toShow
    }
}();