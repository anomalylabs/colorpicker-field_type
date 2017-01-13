$(document).on('ajaxComplete ready', function () {

    // Initialize colorpickers
    $('input[data-provides="anomaly.field_type.colorpicker"]:not([data-initialized])').each(function () {

        var input = $(this);

        input
            .attr('data-initialized', '')
            .closest('.component')
            .colorpicker({
                align: 'left',
                format: input.data('format'),
                colorSelectors: input.data('colors')

            });
    });
});
