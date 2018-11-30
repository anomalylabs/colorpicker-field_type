(function (window, document) {

    let fields = Array.prototype.slice.call(
        document.querySelectorAll('input[data-provides="anomaly.field_type.colorpicker"]')
    );

    fields.forEach(function (field) {

        let swatch = document.getElementById(field.name + '__swatch');

        let picker = new ColorPicker.Default(field, {
            history: {
                hidden: true,
            },
        });

        swatch.addEventListener('click', function (e) {

            e.preventDefault();

            field.focus();
        });
    });
})(window, document);
