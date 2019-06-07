<?php


function date_reverse($date)
{
    $date_array = $path_explode      = explode('.', $date);

    return implode(".", array_reverse($date_array));
}
