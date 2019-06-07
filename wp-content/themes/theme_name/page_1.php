<?php

function get_Page_Data($query)
{
    global $collection;

    $page_id = $collection->get_Const(
        array('page', 'pageName', 'id')
    );

    $post           = get_post($page_id);
    $post_title     = get_the_title($page_id);
    $post_content   = apply_filters('the_content', $post->post_content);

    switch ($query) {
    case 'query_value':
        return $post_content;
        break;
    }
}

?>

<div class="col-8">
    <div>
        <div>
            <div>
                <?php echo get_Page_Data('admin_content'); ?>
            </div>
        </div>
    </div>
</div>
