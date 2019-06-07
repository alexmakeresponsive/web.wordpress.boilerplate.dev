<?php

/**
 * Add custom columns for post type: projects
 */
function theme_name_admin_pages_pages_list_add_columns( $columns )
{
    $num = 4;

    unset($columns['author']);
    unset($columns['comments']);
    unset($columns['date']);

    $new_columns = array(
        'page_link' => 'Ссылка на страницу',
    );

    return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
}
add_filter( 'manage_'.'page'.'_posts_columns', 'theme_name_admin_pages_pages_list_add_columns', 4 );

/**
 * Set data to custom columns for post type: projects
 */
function theme_name_admin_pages_pages_list_add_columns_data( $colname, $post_id )
{
    $link = get_permalink($post_id);

    if( $colname === 'page_link' ){
        echo '<a target="_blank" href="' . $link . '">' . $link . '<a>';
    }
}
add_action('manage_'.'page'.'_posts_custom_column', 'theme_name_admin_pages_pages_list_add_columns_data', 5, 2 );
