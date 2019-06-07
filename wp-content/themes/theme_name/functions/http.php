<?php

function http_get_current_url()
{
    $url_draft = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    $symbol_1_pos = strpos($url_draft, '?');

    if ($symbol_1_pos) {
        return $url_draft . '&';
    } else {
        return $url_draft . '?';
    }
}


function http_get_current_url_original()
{
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function http_get_current_url_host()
{
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
}

function http_get_current_rubric_value()
{
    if ( isset($_GET['rubric']) ) {
        return preg_replace('/[^A-Za-z0-9\-]/', '', $_GET['rubric']);
    }

    return null;
}
