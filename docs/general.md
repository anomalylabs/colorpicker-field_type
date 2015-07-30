# Colorpicker Field Type

- [Introduction](#introduction)
- [Configuration](#configuration)
- [Output](#output)


<a name="introduction"></a>
## Introduction

`anomaly.field_type.checkboxes`

The colorpicker field type provides a color slider input that lets users choose any color.


<a name="configuration"></a>
## Configuration

**Example Definition:**

    protected $fields = [
        'example' => [
            'type'   => 'anomaly.field_type.colorpicker',
            'config' => [
                'default_value' => '#f2364b`
            ]
        ]
    ];

### `default_value`

The default color for the colorpicker. Any valid hexadecimal color value can be used. The default value is `null`.


<a name="output"></a>
## Output

This field type returns the hexadecimal color code by default. 

### `code()`

Return the code only without the leading "#".

    // Twig usage
    {{ entry.example.code }}
    
    // API usage
    $entry->example->code();
