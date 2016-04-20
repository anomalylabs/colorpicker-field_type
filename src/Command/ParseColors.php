<?php namespace Anomaly\ColorpickerFieldType\Command;

use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class ParseColors
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ColorpickerFieldType\Command
 */
class ParseColors implements SelfHandling
{

    /**
     * The string colors.
     *
     * @var string
     */
    protected $colors;

    /**
     * Create a new ParseColors instance.
     *
     * @param $colors
     */
    public function __construct($colors)
    {
        $this->colors = $colors;
    }

    /**
     * Handle the command.
     *
     * @return array
     */
    public function handle()
    {
        $colors = [];

        foreach (explode("\n", $this->colors) as $color) {
            $colors[ltrim(trim($color, "\r\n"), "\r\n")] = ltrim(trim($color, "\r\n"), "\r\n");
        }

        return $colors;
    }
}
