# Configuration

- [Basic Configuration](#basic)

<hr>

Below is the full configuration available with defaults.

    {% code php %}
    protected $fields = [
        "example" => [
            "type"   => "anomaly.field_type.checkboxes",
            "config" => [
                "default_value" => null,
                "format"        => "hex",
                "colors"        => null
            ]
        ]
    ];
    {% endcode %}

<hr>

<a name="basic"></a>
## Basic Configuration

### Default Value

{{ code('php', '"default_type" => "#61259e"') }}

The `default_value` is a core option. This field type can accept a color in any supported format.

### Color Format

Defines the color format for the colorpicker input. Valid options are `hex`, `rgb`, and `rgba`.

{% code php %}
"format" => "rgba"
{% endcode %}

### Predefined Colors

Specifies predefined colors for the user to select *in addition* to the colorpicker UI.

<pre>
{% code php %}
"colors" => [
    "#61259e",
    "#38b5e6",
    "#24ce7b"
]
{% endcode %}
</pre>

<hr>

<a name="handlers"></a>
## Predefined Color Handlers

Color handlers are responsible for setting the predefined colors on the field type. You can define your own handler to add your own logic to predefined color options.

### Defining Custom Handlers

Custom handlers can be defined as a callable string.

{{ code('php', '"handler" => "App/Example/MyColors@handle"') }}

You can also define custom handlers as a closure.

<div class="alert alert-info">
<strong>Remember:</strong> Closures can not be stored in the database so you need to define closures in the form builder.
</div>

    {% code php %}
    protected $fields = [
        "example" => [
            "config" => [
                "handler" => function (ColorpickerFieldType $fieldType) {
                    $fieldtype->setOptions(
                        [
                            "#61259e",
                            "#38b5e6",
                            "#24ce7b"
                        ]
                    );
                }
            ]
        ]
    ];
    {% endcode %}

### Building Custom Handlers

Building custom color handlers could not be easier. Simply create the class with the method you defined in the config option.

{{ code('php', '"handler" => "App/Example/MyColors@handle"') }}

The callable string is called via Laravel's service container. The {{ code('php', '$fieldType') }} is passed as an argument.

<div class="alert alert-primary">
<strong>Note:</strong> Because handlers are called through Laravel's service container, you can automatically inject dependencies into the construct and method.
</div>

    {% code php %}
    class MyColors
    {
        public function handle(ColorpickerFieldType $fieldType)
        {
            $fieldtype->setOptions(
                [
                    "#61259e",
                    "#38b5e6",
                    "#24ce7b"
                ]
            );
        }
    }
    {% endcode %}
