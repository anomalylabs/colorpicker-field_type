# Colorpicker Field Type

*anomaly.field_type.colorpicker*

A colorpicker field type with support for multiple color formats and predefined color palettes.

## Description

The colorpicker field type provides an intuitive color selection interface with support for HEX, RGB, and HSL formats. It features a visual color picker, predefined color palettes, and customizable color handlers.

## Features

- **Multiple Formats**: Support for HEX, RGB, and HSL color formats
- **Visual Picker**: Interactive color picker interface
- **Predefined Palettes**: Custom color palettes via handlers
- **Format Conversion**: Automatic color format conversion
- **Validation**: Built-in color format validation
- **Presenter Methods**: Easy color manipulation and display

## Configuration

### Basic Configuration

```php
'brand_color' => [
    'type' => 'anomaly.field_type.colorpicker',
],
```

### Configuration Options

#### `format` (default: 'hex')
The color format to store.

```php
'color' => [
    'type'   => 'anomaly.field_type.colorpicker',
    'config' => [
        'format' => 'hex',  // hex, rgb, or hsl
    ],
],
```

#### `handler`
Custom color palette handler.

```php
'theme_color' => [
    'type'   => 'anomaly.field_type.colorpicker',
    'config' => [
        'handler' => \App\Theme\ThemeColorsHandler::class,
    ],
],
```

#### `colors`
Array of predefined colors.

```php
'accent_color' => [
    'type'   => 'anomaly.field_type.colorpicker',
    'config' => [
        'colors' => [
            '#FF0000' => 'Red',
            '#00FF00' => 'Green',
            '#0000FF' => 'Blue',
        ],
    ],
],
```

## Color Formats

### HEX Format (Default)
```php
'config' => [
    'format' => 'hex',
]
// Output: #FF5733
```

### RGB Format
```php
'config' => [
    'format' => 'rgb',
]
// Output: rgb(255, 87, 51)
```

### HSL Format
```php
'config' => [
    'format' => 'hsl',
]
// Output: hsl(9, 100%, 60%)
```

## Usage Examples

### Basic Color Picker

```php
protected $fields = [
    'background_color' => [
        'type' => 'anomaly.field_type.colorpicker',
    ],
];
```

### With Predefined Colors

```php
'brand_color' => [
    'type'   => 'anomaly.field_type.colorpicker',
    'config' => [
        'colors' => [
            '#1a202c' => 'Dark Gray',
            '#2d3748' => 'Gray',
            '#4a5568' => 'Medium Gray',
            '#718096' => 'Light Gray',
        ],
    ],
],
```

### Custom Color Handler

```php
'theme_color' => [
    'type'   => 'anomaly.field_type.colorpicker',
    'config' => [
        'handler' => 'App\Theme\ThemeColorsHandler@handle',
    ],
],
```

Handler example:

```php
namespace App\Theme;

use Anomaly\ColorpickerFieldType\ColorpickerFieldType;

class ThemeColorsHandler
{
    public function handle(ColorpickerFieldType $fieldType)
    {
        $colors = [
            '#667eea' => 'Primary',
            '#764ba2' => 'Secondary',
            '#f093fb' => 'Accent',
            '#4facfe' => 'Info',
            '#43e97b' => 'Success',
            '#fa709a' => 'Warning',
            '#f8485e' => 'Danger',
        ];
        
        $fieldType->setColors($colors);
    }
}
```

## Accessing Values

### Basic Output

```php
// Get the color value
$color = $entry->brand_color; // #FF5733

// Use in CSS
echo "background-color: {$entry->brand_color};";
```

### In Templates

```twig
{# Direct output #}
<div style="background-color: {{ entry.brand_color }}">
    Colored background
</div>

{# As inline style #}
<span style="color: {{ entry.text_color }}">
    Colored text
</span>

{# Check if set #}
{% if entry.brand_color %}
    <style>
        .brand { color: {{ entry.brand_color }}; }
    </style>
{% endif %}
```

### Presenter Output

```php
// Access via presenter
$color = $entry->present()->brand_color;

// Color manipulation methods (if available)
echo $entry->present()->brand_color->darken(10);
echo $entry->present()->brand_color->lighten(10);
```

## Setting Values

### Direct Assignment

```php
$entry->brand_color = '#FF5733';
$entry->save();
```

### With RGB Format

```php
$entry->brand_color = 'rgb(255, 87, 51)';
$entry->save();
```

### With HSL Format

```php
$entry->brand_color = 'hsl(9, 100%, 60%)';
$entry->save();
```

## Validation

```php
'brand_color' => [
    'type'  => 'anomaly.field_type.colorpicker',
    'rules' => [
        'required',
        'regex:/^#[0-9A-Fa-f]{6}$/', // Validate HEX format
    ],
],
```

## Common Use Cases

### Theme Customization
```php
'primary_color' => 'colorpicker',
'secondary_color' => 'colorpicker',
'accent_color' => 'colorpicker',
```

### Branding
```php
'logo_background' => 'colorpicker',
'header_color' => 'colorpicker',
'button_color' => 'colorpicker',
```

### Content Highlighting
```php
'highlight_color' => 'colorpicker',
'badge_color' => 'colorpicker',
'alert_color' => 'colorpicker',
```

### Category Color Coding
```php
'category_color' => [
    'type'   => 'colorpicker',
    'config' => [
        'colors' => [
            '#ef4444' => 'Red - Urgent',
            '#f59e0b' => 'Orange - Warning',
            '#10b981' => 'Green - Normal',
            '#3b82f6' => 'Blue - Info',
        ],
    ],
],
```

## Database Column Type

The field type stores color values as VARCHAR:

```php
Schema::table('your_table', function (Blueprint $table) {
    $table->string('brand_color', 50)->nullable();
});
```

## Best Practices

### Choose Appropriate Format
- **HEX**: Best for web colors, CSS compatibility
- **RGB**: Better for programmatic manipulation
- **HSL**: Easiest for color adjustments (hue, saturation, lightness)

### Provide Meaningful Palettes
- Use branded colors for consistency
- Include accessible color combinations
- Label colors clearly for users

### Accessibility
- Ensure sufficient color contrast
- Don't rely solely on color for information
- Test with color blindness simulators

## Advanced Usage

### Generating CSS Variables

```php
// In a service provider or helper
$colors = [
    'primary' => $settings->primary_color,
    'secondary' => $settings->secondary_color,
];

$css = ':root {';
foreach ($colors as $name => $value) {
    $css .= "--color-{$name}: {$value};";
}
$css .= '}';
```

### Dynamic Theming

```twig
<style>
    :root {
        --primary-color: {{ settings.primary_color }};
        --secondary-color: {{ settings.secondary_color }};
    }
    
    .btn-primary {
        background-color: var(--primary-color);
    }
</style>
```

## Requirements

- PyroCMS 3.x
- Anomaly Streams Platform ^1.10

## License

This field type is open-sourced software licensed under the [MIT license](LICENSE.md).

## Authors

- **PyroCMS, Inc.** - [Website](http://pyrocms.com/) - support@pyrocms.com
- **Ryan Thompson** - [Website](http://ryanthepyro.com/)

