<?php namespace Anomaly\ColorpickerFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

/**
 * Class ColorpickerFieldTypePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
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
