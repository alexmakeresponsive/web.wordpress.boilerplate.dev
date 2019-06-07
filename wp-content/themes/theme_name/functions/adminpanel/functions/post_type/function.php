<?php

/**
 * Add fixed position for #submitdiv element when post edit
 */
function theme_name_admin_post_edit_submitdiv($hook)
{
    $WP_Screen_current = get_current_screen();

    if ( $WP_Screen_current->id !== 'post_type_projects') {
        return;
    }

    wp_enqueue_style(
        'theme_name_plugin_name_admin_post_edit_submitdiv',
        get_template_directory_uri() . '/functions/adminpanel/styles/submitdiv.css'
    );
}
add_filter('admin_enqueue_scripts', 'theme_name_admin_post_edit_submitdiv');
