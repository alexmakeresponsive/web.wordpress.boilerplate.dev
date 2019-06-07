<?php

function theme_name_functions_post_types_pagination_ajax()
{
    /**
     * @param int
     */
    $current_page_id  = $_POST['r']['current_page_id']*1;
    /**
     * @param int
     */
    $current_page_value = $_POST['r']['paged']*1;
    /**
     * @param int
     */
    $posts_count_init = $_POST['r']['posts_count_init']*1;
    /**
     * @param int
     */
    $posts_count_loaded = $_POST['r']['posts_count_loaded']*1;
    /**
     * @param string
     */
    $taxonomy_slug = $_POST['r']['taxonomy_slug'];
    /**
     * @param string
     */
    $catalog_name = $_POST['r']['catalog_name'];
    /**
     * @param array
     */
    $query_vars = $_POST['r']['query_vars'];

    $offset = null;

    if ($current_page_value === 1) {
        $offset = $posts_count_init;
    } else {
      //$offset = $posts_count_init + $posts_count_loaded * $current_page_value;
      //$offset = 4 + 2 * 2 = 8;        //6
      //$offset = 4 + 2 * 3 = 10;       //8
      //$offset = 4 + 2 * 4 = 12;       //10
      //$offset = $posts_count_init + $posts_count_loaded * $current_page_value - $posts_count_loaded;
        $offset = $posts_count_init + ($current_page_value - 1)*$posts_count_loaded;
      //$offset = 4 + (2-1)*2 = 6
      //$offset = 4 + (3-1)*2 = 8
      //$offset = 4 + (4-1)*2 = 10
    }

    $args = array(
        'post_type'             => $_POST['r']['post_type'],
        'order'                 => $_POST['r']['posts_order'],
        'posts_per_page'        => $posts_count_loaded,
        'paged'                 => null, //if offset isset: WP_Query use offest instead paged
        'offset'                => $offset,
        $taxonomy_slug          => $_POST['r']['rubric_slug'],
    );

    $items_list = new WP_Query($args);

    while ( $items_list->have_posts() ) {
        $items_list->the_post();

        if ( !empty($query_vars) ) {
            foreach ($query_vars as $query_var) {
                set_query_var( $query_var['name'], $query_var['value'] );
            }
        }

        get_template_part("template-parts/post_type/$catalog_name/index");
    }
    die();
}
add_action('wp_ajax_post_type_pr', 'theme_name_functions_post_types_pagination_ajax');
add_action('wp_ajax_nopriv_post_type_pr', 'theme_name_functions_post_types_pagination_ajax');

add_action('wp_ajax_post_type_nw', 'theme_name_functions_post_types_pagination_ajax');
add_action('wp_ajax_nopriv_post_type_nw', 'theme_name_functions_post_types_pagination_ajax');
