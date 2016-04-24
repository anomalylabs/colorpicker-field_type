# Usage

- [Setting Values](#mutator)
- [Basic Output](#output)
- [Presenter Output](#presenter)

<hr>

<a name="mutator"></a>
## Setting Values

You can set the colorpicker field type value with an valid color value in the configured format.

    $entry->example = "#61259e";

<hr>

<a name="output"></a>
## Basic Output

The colorpicker field type returns `null` or the color value in the configured format.

    $entry->example; // #61259e

<hr>

<a name="presenter"></a>
## Presenter Output

When accessing the value from a decorated entry, like one in a view, the colorpicker field type presenter is returned instead.

### Returning Different Formats

The code *only* portion of a hexadecimal color code can be extracted quickly with the `code` method.

    $entry->example->code() // 61259e;

You can return the color value in various formats regardless of the configured/input format too.

    $entry->example->hex();  // #61259e
    $entry->example->rgb();  // rgb(97, 37, 158)
    $entry->example->rgba(); // rgba(97, 37, 158, 1)

### Extracting Channel Levels

You can also use the presenter to extract the color channel levels from the color value.

    $entry->example->red();     // 97
    $entry->example->green();   // 37
    $entry->example->blue();    // 158
    $entry->example->opacity(); // 1

<div class="alert alert-info">
<strong>Remember:</strong> You can access presenter and object methods in valuated strings like table columns too.
</div>

    protected $columns = [
        'entry.color.rgb'
    ];