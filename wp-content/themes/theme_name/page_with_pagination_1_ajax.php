<?php

use Theme\ThemeName\Service\Pagination\Pagination_Ajax;

$items_list = new WP_Query($args);

?>

<!--Pagination(axaj)-->
<div class="col-12">
    <?php

    $args_pagination = array(
        'page_slug'     => 'index',
        'post_slug'     => 'pr',
        'paged'         => $paged,
        'rubric_slug'   => $category_current,
        'taxonomy_slug' => $taxonomy_slug,
        'container_id'  => 'ajax-container-1-post-type-pr',
        'posts_order'   => 'DESC',
        'found_posts'   => intval($items_list->found_posts),
        'collection_index' => array(
            'posts_count_init'      => 20,
            'posts_count_loaded'    => 21,
        ),
        'catalog_name'  => 'project',
        'query_vars' => array(),
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
