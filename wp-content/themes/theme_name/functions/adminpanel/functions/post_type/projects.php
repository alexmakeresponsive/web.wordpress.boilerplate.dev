<?php

/**
 * Add custom columns for post type: projects
 */
function theme_name_admin_pages_post_type_projects_grid_add_columns( $columns )
{
    $num = 4;

    unset($columns['author']);
    unset($columns['comments']);

    $new_columns = array(
        'date_payment_last' => 'Дата последнего платежа',
        'project_rating' => 'Количество звёзд',
    );

    return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
}
add_filter( 'manage_'.'post_type_projects'.'_posts_columns', 'theme_name_admin_pages_post_type_projects_grid_add_columns', 4 );

/**
 * Set data to custom columns for post type: projects
 */
function theme_name_admin_pages_post_type_projects_grid_set_column_data( $colname, $post_id )
{
    $date_array = $path_explode = explode('.', get_post_meta( $post_id, '_theme_name_cbr_post_pr_last_payment', 1 ));

    if( $colname === 'date_payment_last' ){
        echo implode(".", array_reverse($date_array));
    }

    if( $colname === 'project_rating' ){
        $markup_rating = '<span class="theme_name-project-rating-stars-1 count-' . get_post_meta( $post_id, '_theme_name_cbr_post_pr_rating', 1 ) .'">';
        $markup_rating .= '</span>';

        echo $markup_rating;
    }
}
add_action('manage_'.'post_type_projects'.'_posts_custom_column', 'theme_name_admin_pages_post_type_projects_grid_set_column_data', 5, 2 );

/**
 * Add js or css for customize columns for post type: projects
 */
function theme_name_admin_pages_post_type_projects_grid_scripts($hook)
{
    if( !isset($_GET['post_type']) ) {
        return;
    }

    if( $_GET['post_type'] !== 'post_type_projects' ) {
        return;
    }

    wp_enqueue_style(
        'theme_name_admin_pages_post_type_projects_grid_style',
        get_template_directory_uri() . '/functions/adminpanel/styles/ratings.css'
    );
}
add_action('admin_enqueue_scripts', 'theme_name_admin_pages_post_type_projects_grid_scripts');
