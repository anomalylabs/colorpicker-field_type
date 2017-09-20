---
title: Usage
---

## Usage[](#usage)

This section will show you how to use the field type via API and in the view layer.


### Setting Values[](#usage/setting-values)

You can set the colorpicker field type value with an valid color value in the configured format.

    $entry->example = "#61259e";


### Basic Output[](#usage/basic-output)

The colorpicker field type returns `null` or the color value in the configured format.

    $entry->example; // #61259e


### Presenter Output[](#usage/presenter-output)

This section will show you how to use the decorated value provided by the `\Anomaly\ColorpickerFieldType\ColorpickerFieldTypePresenter` class.


#### ColorpickerFieldTypePresenter::code()[](#usage/presenter-output/colorpickerfieldtypepresenter-code)

The `code` method returns the code portion of the hex value.

###### Returns: `string`

###### Example

    $decorated->example->code();

###### Twig

    {{ decorated.example.code() }}


#### ColorpickerFieldTypePresenter::hex()[](#usage/presenter-output/colorpickerfieldtypepresenter-hex)

The `hex` method returns the value has a hex code.

###### Returns: `string`

###### Example

    $decorated->example->hex();

###### Twig

    {{ decorated.example.hex() }}


#### ColorpickerFieldTypePresenter::rgb()[](#usage/presenter-output/colorpickerfieldtypepresenter-rgb)

The `rgb` method returns the value as an RGB definition.

###### Returns: `string`

###### Example

    $decorated->example->rgb();

###### Twig

    {{ decorated.example.rgb() }}


#### ColorpickerFieldTypePresenter::rgba()[](#usage/presenter-output/colorpickerfieldtypepresenter-rgba)

The `rgba` method returns the value as an `rgba` definition.

###### Example

    $decorated->example->rgba();

###### Twig

    {{ decorated.example.rgba() }}


#### ColorpickerFieldTypePresenter::levels()[](#usage/presenter-output/colorpickerfieldtypepresenter-levels)

The `levels` method returns an array of `red`, `blue`, and `green` levels. An optional `opacity` level is returned if the configured format is `rgba`.

###### Returns: `array`

###### Example

    $decorated->example->levels()['red'];

###### Twig

    {{ decorated.example.levels().red }}


#### ColorpickerFieldTypePresenter::red()[](#usage/presenter-output/colorpickerfieldtypepresenter-red)

The `red` method returns the level of red in the value.

###### Returns: `integer`

###### Example

    $decorated->example->red();

###### Twig

    {{ decorated.example.red() }}


#### ColorpickerFieldTypePresenter::blue()[](#usage/presenter-output/colorpickerfieldtypepresenter-blue)

The `blue` method returns the level of blue in the value.

###### Example

    $decorated->example->blue();

###### Twig

    {{ decorated.example.blue() }}


#### ColorpickerFieldTypePresenter::green()[](#usage/presenter-output/colorpickerfieldtypepresenter-green)

The `green` method returns the level of green in the value.

###### Returns: `integer`

###### Example

    $decorated->example->green();

###### Twig

    {{ decorated.example.green() }}


#### ColorpickerFieldTypePresenter::opacity()[](#usage/presenter-output/colorpickerfieldtypepresenter-opacity)

The `opacity` method returns the opacity level of the value.

###### Returns: `integer`

###### Example

    $decorated->example->opacity();

###### Twig

    {{ decorated.example.opacity() }}
