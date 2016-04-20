<?php namespace Anomaly\ColorpickerFieldType\Handler;

use Anomaly\ColorpickerFieldType\ColorpickerFieldType;
use Anomaly\ColorpickerFieldType\Command\ParseColors;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Collection;

/**
 * Class DefaultHandler
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ColorpickerFieldType\Handler
 */
class DefaultHandler
{

    use DispatchesJobs;

    /**
     * Handle the predefined colors.
     *
     * @param ColorpickerFieldType $fieldType
     */
    public function handle(ColorpickerFieldType $fieldType)
    {
        $colors = $fieldType->config('colors', []);

        if (is_string($colors)) {
            $colors = $this->dispatch(new ParseColors($colors));
        }

        $fieldType->setColors((array)$colors);
    }
}
