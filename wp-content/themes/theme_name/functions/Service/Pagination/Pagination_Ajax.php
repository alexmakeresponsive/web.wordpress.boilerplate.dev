<?php

namespace Theme\ThemeName\Service\Pagination;

class Pagination_Ajax
{
    private $collection;

    private $page_slug;
    private $post_slug;
    private $found_posts;
    private $paged;
    private $rubric_slug;
    private $taxonomy_slug;
    private $container_id;
    private $posts_order;
    private $collection_index;
    private $catalog_name;
    private $query_vars;

    public $data_request;
    public $is_ajax_button_visible;

    public $test_found_posts;
    public $test_posts_count_init_available;
    public $test_posts_count_loaded;

    function __construct($collection, $args)
    {
        $this->collection       = $collection;
        $this->page_slug        = $args['page_slug'];
        $this->post_slug        = $args['post_slug'];
        $this->found_posts      = $args['found_posts'];
        $this->paged            = $args['paged'];
        $this->rubric_slug      = $args['rubric_slug'];
        $this->taxonomy_slug    = $args['taxonomy_slug'];
        $this->container_id     = $args['container_id'];
        $this->posts_order      = $args['posts_order'];
        $this->collection_index = $args['collection_index'];
        $this->catalog_name     = $args['catalog_name'];
        $this->query_vars       = $args['query_vars'];

        $this->get_Data_Request();
        $this->is_Ajax_Button_Visible();
    }

    private function get_Post_Type()
    {
        return $this->collection->get_Const(array('post', $this->post_slug));
    }

    private function get_Page_Current_Id()
    {
        return $this->collection->get_Const(array('page', $this->page_slug, 'id'));
    }

    private function get_Posts_Count_Init()
    {
        $pade_id                = $this->get_Page_Current_Id();
        $collection_index       = $this->collection_index;
        $collection_index_init  = $collection_index['posts_count_init'];
        $field_name             = $this->collection->get_Const(array('fields', 'via_plugins', 'plugin_fields' , 'post', $this->post_slug, $collection_index_init ));

        return plugin_get_post_meta($pade_id, $field_name);
    }

    private function get_Posts_Count_Loaded()
    {
        $pade_id                    = $this->get_Page_Current_Id();
        $collection_index           = $this->collection_index;
        $collection_index_loaded    = $collection_index['posts_count_loaded'];
        $field_name                 = $this->collection->get_Const(array('fields', 'via_plugins', 'plugin_fields' , 'post', $this->post_slug, $collection_index_loaded ));

        return plugin_get_post_meta($pade_id, $field_name);
    }

    private function get_Posts_Count_Init_Available()
    {
        $posts_count_init           = $this->get_Posts_Count_Init();
        $posts_count_init_available = $posts_count_init;

        if ($this->found_posts < $posts_count_init) {
            $posts_count_init_available = $this->found_posts;
        }

        return intval($posts_count_init_available);
    }

    private function get_Max_Num_Pages()
    {
        $posts_count_init_available = $this->get_Posts_Count_Init_Available();
        $posts_count_loaded         = $this->get_Posts_Count_Loaded();

        $this->test_found_posts                     = $this->found_posts;
        $this->test_posts_count_init_available      = $posts_count_init_available;
        $this->test_posts_count_loaded              = $posts_count_loaded;


        return (1 + ceil( ($this->found_posts - $posts_count_init_available )/$posts_count_loaded ) );
    }

    private function get_Data_Request()
    {
        $data_request = array(
            'paged'                 => $this->paged,
            'max_num_pages'         => $this->get_Max_Num_Pages(),
            'current_page_id'       => $this->get_Page_Current_Id(),
            'post_type'             => $this->get_Post_Type(),
            'rubric_slug'           => $this->rubric_slug,
            'taxonomy_slug'         => $this->taxonomy_slug,
            'posts_count_init'      => $this->get_Posts_Count_Init_Available(),
            'posts_count_loaded'    => $this->get_Posts_Count_Loaded(),
            'container_id'          => $this->container_id,
            'wp_ajax_action_name'   => 'post_type_' . $this->post_slug,
            'posts_order'           => $this->posts_order,
            'catalog_name'          => $this->catalog_name,
            'query_vars'            => $this->query_vars,
        );
        $this->data_request = htmlspecialchars(json_encode($data_request), ENT_QUOTES, 'UTF-8');
    }

    private function is_Ajax_Button_Visible()
    {
        $posts_count_init_available = $this->get_Posts_Count_Init_Available();

            $this->is_ajax_button_visible = false;

        if ($this->found_posts > $posts_count_init_available ) {
            $this->is_ajax_button_visible = true;
        }
    }
}
