<?php

/**
 * Remove items from main admin menu
 */
function theme_name_admin_custom_menu()
{
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'tools.php' );
    remove_submenu_page( 'options-general.php', 'options-permalink.php' );
    remove_submenu_page( 'options-general.php', 'options-discussion.php' );
    remove_submenu_page( 'options-general.php', 'options-reading.php' );
    remove_submenu_page( 'options-general.php', 'options-media.php' );
    remove_submenu_page( 'options-general.php', 'options-writing.php' );
}
add_action( 'admin_menu', 'theme_name_admin_custom_menu' );

function remove_theme_submenu() {
    remove_submenu_page('themes.php', 'theme-editor.php');
}
add_action('admin_init', 'remove_theme_submenu', 100);

function theme_name_admin_pages_appearence_scripts($hook)
{
    wp_enqueue_style(
        'theme_name_admin_pages_appearence_scripts',
        get_template_directory_uri() . '/functions/adminpanel/styles/appearence.css'
    );
}
add_action('admin_enqueue_scripts', 'theme_name_admin_pages_appearence_scripts');

/**
 * Change sort order for main admin menu
 */
function theme_name_admin_custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

    return array(
        'index.php', // Dashboard
        'users.php', // Users
        'options-general.php', // Settings
        'plugins.php', // Plugins
        'themes.php', // Appearance
        'separator1', // First separator

        'upload.php', // Media
        'separator2', // Second separator

        'edit.php', // Posts
        'crb_plugin_name_container_2.php', // Header
        'crb_plugin_name_container_4.php', // Сайдбары
        'edit.php?post_type=page', // Pages
        'edit.php?post_type=post_type_projects', // Projects
        'edit.php?post_type=post_type_news', // News
        'crb_plugin_name_container_3.php', // Footer
        'separator-last', // Last separator

        'tools.php', // Tools
        'link-manager.php', // Links
        'edit-comments.php', // Comments
    );
}
add_filter( 'custom_menu_order', 'theme_name_admin_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'theme_name_admin_custom_menu_order', 10, 1 );
