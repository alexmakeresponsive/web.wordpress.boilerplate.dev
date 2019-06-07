<?php

/**
 * Add custom columns for post type: news
 */
function theme_name_admin_pages_post_type_news_grid_add_columns( $columns )
{
    $num = 2;

    unset($columns['comments']);

    $new_columns = array(
        'visit_count' => 'Количество <br> просмотров',
    );

    return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
}
add_filter( 'manage_'.'post_type_news'.'_posts_columns', 'theme_name_admin_pages_post_type_news_grid_add_columns', 4 );

/**
 * Set data to custom columns for post type: news
 */
function theme_name_admin_pages_post_type_news_grid_set_column_data( $colname, $post_id )
{
    $count_value = get_post_meta( $post_id, '_theme_name_cbr_post_nw_visit_page_count', true );
    $count_value = empty($count_value) ? 0 : $count_value;

    if( $colname === 'visit_count' ){
        echo $count_value;
    }
}
add_action('manage_'.'post_type_news'.'_posts_custom_column', 'theme_name_admin_pages_post_type_news_grid_set_column_data', 5, 2 );
