(function (window, document) {

    let fields = Array.from(
        document.querySelectorAll('input[data-provides="anomaly.field_type.colorpicker"]')
    );

    fields.forEach(function (field) {

        document.querySelector('#' + field.name + '__color').addEventListener('change', function (event) {
            field.value = event.target.value;
        });
    });
})(window, document);
