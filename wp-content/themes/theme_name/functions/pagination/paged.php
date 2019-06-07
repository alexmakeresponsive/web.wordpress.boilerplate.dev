<?php
/**
 * Created by PhpStorm.
 * User: aleksandrgorcakov
 * Date: 27.02.2019
 * Time: 10:31
 */

function theme_name_functions_post_types_pagination($count_posts, $count_posts_on_page, $current_page, $number_last_page ,$count_max_links_in_pagination = 5)
{
    $count_links_to_pages = ceil($count_posts / $count_posts_on_page);

    //get $number_page_first
    $number_page_first = $current_page -  floor($count_max_links_in_pagination / 2);
    if ( $number_page_first <= 1 )
         $number_page_first = 1;
    else {
        if ( $count_links_to_pages - $number_page_first < $count_max_links_in_pagination ){
            $number_page_first = $count_links_to_pages - $count_max_links_in_pagination + 1;
            if ( $number_page_first <= 1 )
                 $number_page_first = 1;
        }
    }

    //get $number_page_last
    $number_page_last = $number_page_first + $count_max_links_in_pagination - 1;
    if ( $number_page_last > $count_links_to_pages )
        $number_page_last = $count_links_to_pages;



    $number_page_first =intval($number_page_first);
    $number_page_last =intval($number_page_last);

    $current_url = theme_name_http_get_current_url();

    $markup = '';
    $markup .= '<ul class="theme_name-pagination-list">';
    $markup .= '<li class="theme_name-pagination-item-extreme">';
    $markup .= '<a  class="theme_name-pagination-link-extreme" href="'. $current_url .'paged='. 1 .'">';
    $markup .= 'Начало';
    $markup .= '</a>';
    $markup .= '</li>';

    for ( $i = $number_page_first; $i <= $number_page_last; $i++ ){


        if( $i !== $current_page ) {
            $markup .= '<li class="theme_name-pagination-item">';
            $markup .= '<a class="theme_name-pagination-link" href="'. $current_url .'paged='. $i .'">';
            $markup .= $i;
            $markup .= '</a>';
        } else {
            $markup .= '<li class="theme_name-pagination-item-current">';
            $markup .= '<span class="theme_name-pagination-current-text">';
            $markup .= $i;
            $markup .= '</span>';
        }

        $markup .= '</li>';
    }

    $markup .= '<li class="theme_name-pagination-item-extreme">';
    $markup .= '<a  class="theme_name-pagination-item-extreme" href="'. $current_url .'paged='. $number_last_page .'">';
    $markup .= 'Конец';
    $markup .= '</a>';
    $markup .= '</li>';
    $markup .= '</ul>';


    return $markup;
}
