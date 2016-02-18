$(function () {

    // Initialize colorpickers
    $('input[data-provides="anomaly.field_type.colorpicker"]').each(function () {
        $(this).closest('.colorpicker-component').colorpicker();
    });
});
