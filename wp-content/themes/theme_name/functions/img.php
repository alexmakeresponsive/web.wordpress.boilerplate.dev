<?php

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'user-avatar-thumb', 300, 300, true );
    add_image_size( 'project-sidebar-thumb', 30, 30,   true );
    add_image_size( 'project-cart-thumb', 64, 64,   true );
    add_image_size( 'news-cart-thumb', 210, 210, true );
}

/*
In template where use <?php echo get_the_post_thumbnail( get_the_ID(), array(210, 210) );  ?>
Wordpress create img instead <?php echo get_the_post_thumbnail...;  ?>
But image may have 210x138 size
*/
// add_theme_support( 'post-thumbnails' );


function img_path_insert_suffix($path, $suffix)
{
    $pos_last   = strrpos($path,'.');
    $ext        = substr($path, $pos_last, strlen($path));

    return substr($path, 0, $pos_last) . $suffix . $ext;
}
