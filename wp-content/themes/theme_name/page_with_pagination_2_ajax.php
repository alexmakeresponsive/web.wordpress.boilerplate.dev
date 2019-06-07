<?php

use Theme\ThemeName\Service\Pagination\Pagination_Ajax;

$items_list = new WP_Query($args);

$news_list_admin_excerpt_length = plugin_get_post_meta(
    $current_page_id,
    get_consts(array('fields', 'via_plugins', 'plugin_fields' , 'page', 'news', 3 ))
);
$news_list_admin_excerpt_end_text = plugin_get_post_meta(
    $current_page_id,
    get_consts(array('fields', 'via_plugins', 'plugin_fields' , 'page', 'news', 4 ))
);
$news_list_admin_title_end_text = plugin_get_post_meta(
    $current_page_id,
    get_consts(array('fields', 'via_plugins', 'plugin_fields' , 'page', 'news', 7 ))
);
?>

<?php if ( $news_list->have_posts() ) : while ( $news_list->have_posts() ) : $news_list->the_post(); ?>
    <!-- Article -->
    <?php set_query_var( 'admin_excerpt_length',   $news_list_admin_excerpt_length ); ?>
    <?php set_query_var( 'admin_excerpt_end_text', $news_list_admin_excerpt_end_text ); ?>
    <?php set_query_var( 'admin_title_end_text',   $news_list_admin_title_end_text ); ?>
    <?php get_template_part('template-parts/post-type/article/index') ?>
    <!-- Article -->
<?php endwhile; ?>

<!--Pagination(axaj)-->
<div class="col-12">
    <?php
    $args_pagination = array(
        'page_slug'     => 'news',
        'post_slug'     => 'nw',
        'paged'         => $paged,
        'rubric_slug'   => null,
        'taxonomy_slug' => $taxonomy_slug,
        'container_id'  => 'ajax-container-1-post-type-nw',
        'posts_order'   => 'DESC',
        'found_posts'   => intval($items_list->found_posts),
        'collection_index' => array(
            'posts_count_init'      => 0,
            'posts_count_loaded'    => 1,
        ),
        'catalog_name'  => 'article',
        'query_vars'    => array(
            array(
                'name'  => 'admin_excerpt_length',
                'value' => $news_list_admin_excerpt_length,
            ),
            array(
                'name'  => 'admin_excerpt_end_text',
                'value' => $news_list_admin_excerpt_end_text,
            ),
            array(
                'name'  => 'admin_title_end_text',
                'value' => $news_list_admin_title_end_text,
            ),
        ),
    );
    $pagination_ajax = new Pagination_Ajax($collection, $args_pagination);
    ?>

    <?php if ( $pagination_ajax->is_ajax_button_visible ): ?>
    <a href="#load-more" class="load-more" id="ajax-button-for-ajax-container-1"
       data-request="<?php echo $pagination_ajax->data_request; ?>">
        Загрузить ещё
    </a>
    <?php endif;?>
</div>
<!--Pagination-->
<?php wp_reset_postdata(); ?>
