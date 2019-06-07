<?php

function theme_name_post_type_projects() {
    $labels = array(

    );
    $args = array(

    );
    register_post_type(theme_name_get_consts(array('post', 'pr')), $args);
}


function theme_name_post_type_news() {
    $labels = array(

    );
    $args = array(

    );
    register_post_type(theme_name_get_consts(array('post', 'nw')), $args);
}
add_action( 'init', 'theme_name_post_type_news' ); // Использовать функцию только внутри хука init
add_action( 'init', 'theme_name_post_type_projects' );
