var FilterForm = function () {
    return {
        init: function (form) {
            console.log('Para lo del formulario');
            $(form).find(':input[type="text"].date-range').each(function () {
                $(this).daterangepicker({
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '01/01/1999',
                    maxDate: moment(),
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Hoy': [moment(), moment()],
                        'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Últimos 7 Días': [moment().subtract(6, 'days'), moment()],
                        'Últimos 30 Días': [moment().subtract(29, 'days'), moment()],
                        'Éste mes': [moment().startOf('month'), moment().endOf('month')],
                        'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'right',
                    buttonClasses: ['btn btn-default'],
                    applyClass: 'btn-small btn-primary',
                    cancelClass: 'btn-small',
                    format: 'DD MMMM YYYY',
                    separator: ' hasta ',
                    locale: {
                        applyLabel: 'Submit',
                        cancelLabel: 'Limpiar',
                        fromLabel: 'Desde',
                        toLabel: 'Hasta',
                        customRangeLabel: 'Custom',
                        daysOfWeek: ['Dom', 'Lun', 'Mar', 'Mie', 'Ju', 'Vie', 'Sab'],
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Augosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        firstDay: 1
                    }

                });
            });
        }
    }
}();
