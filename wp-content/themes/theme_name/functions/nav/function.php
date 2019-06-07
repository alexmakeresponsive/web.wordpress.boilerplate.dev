<?php

function theme_name_setup(){
    register_nav_menus(array(
        'main-menu' => 'Главное Меню'
    ));

    function get_main_menu(){
        wp_nav_menu(array(
            'theme_location' => 'menu-1',
            'menu_class'     => 'navbar-nav',
            'container'      => '',
            'walker'         => new Menu_main,
            'items_wrap'     => '<div class="%2$s">%3$s</div>',
        ));
    }

    include __DIR__ . '/Menu_main.php';
}
add_action( 'after_setup_theme', 'theme_name_setup' );
