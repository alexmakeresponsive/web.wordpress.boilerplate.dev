<?php

namespace Theme\ThemeName\Options;

use Theme\ThemeName\Options\Options;

class General extends Options
{
    private $general_options_collection = array();

    function __construct($options_collection)
    {
        foreach ($options_collection as $value) {
            $this->general_options_collection[] = get_option($value);
        }
    }

    public function get_Option($index)
    {
        $collection = $this->general_options_collection;

        return $collection[$index];
    }
}
