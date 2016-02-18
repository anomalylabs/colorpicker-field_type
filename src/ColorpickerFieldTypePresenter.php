<?php namespace Anomaly\ColorpickerFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

/**
 * Class ColorpickerFieldTypePresenter
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ColorpickerFieldType
 */
class ColorpickerFieldTypePresenter extends FieldTypePresenter
{

    /**
     * Return the code only.
     *
     * @return string
     */
    public function code()
    {
        return ltrim($this->object->getValue(), '#');
    }
}
