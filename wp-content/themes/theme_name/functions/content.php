<?php

function content_title_get_row_count($title_value)
{
    if (mb_strlen($title_value) < 49 ) {
        return 1;
    }

    if (mb_strlen($title_value) > 49 &&  mb_strlen($title_value) < 99) {
        return 1;
    }

    if (mb_strlen($title_value) >= 99 ) {
        return 2;
    }
}

function get_content_title_news($title_value, $admin_title_end_text)
{
    $row_count                  = content_title_get_row_count($title_value);
    $title_length_max_rows      = 49 * $row_count + $row_count - 1;
    $title_value_length         = mb_strlen($title_value);

    if ( $title_value_length <= $title_length_max_rows ) {          // 155 > 149
        return $title_value;
    }

    $title_value_length_remove  = $title_value_length - $title_length_max_rows;
    $title_value_cut            = '';
    $words_collection           = array();
    $symbol_space               = ' ';
    $title_value_explode        = explode( $symbol_space, $title_value );
    $title_value_words_count    = count($title_value_explode);      // 25
    $title_value_space_count    = $title_value_words_count - 1;     // 24

    foreach ($title_value_explode as $word_key => $word_value) {
        $words_collection[$word_key]['word']   = $word_value;
        $words_collection[$word_key]['length'] = mb_strlen($word_value);
    }

    $words_collection_reverse                   = array_reverse($words_collection);
    $words_collection_reverse_key_count_remove  = 0;
    $words_collection_reverse_words_length      = 0;

    foreach ($words_collection_reverse as $r_el_key => $r_el_value) {
        $words_collection_reverse_words_length += $r_el_value['length'];

        if ( $words_collection_reverse_words_length > $title_value_length_remove ) {
            break;
        }

        $words_collection_reverse_key_count_remove++;
    }

    $title_value_explode_slice_length   = count($title_value_explode) - $words_collection_reverse_key_count_remove;
    $title_value_explode_slice          = array_slice($title_value_explode, 0, $title_value_explode_slice_length);
    $title_value_cut                    = implode(' ', $title_value_explode_slice);

    $admin_title_end_text = mb_strimwidth( $admin_title_end_text, 0, 5 );

    return $title_value_cut . ' ' . $admin_title_end_text;
}


function get_content_content_news($title_value ,$content_value, $admin_excerpt_length, $admin_excerpt_end_text)
{
    $title_row_count           = content_title_get_row_count($title_value);
        $words_count_max_value = 0;

    switch ($title_row_count) {
    case 1:
        $words_count_max_value = 20;
        break;
    case 2:
        $words_count_max_value = 10;
        break;
    case 3:
        $words_count_max_value = 0;
        break;
    }

    if ($admin_excerpt_length > $words_count_max_value) {
        $admin_excerpt_length = $words_count_max_value;
    }

    $admin_excerpt_end_text = mb_strimwidth( $admin_excerpt_end_text, 0, 5 );

    return wp_trim_words( $content_value, $admin_excerpt_length, ' '. $admin_excerpt_end_text );
}
