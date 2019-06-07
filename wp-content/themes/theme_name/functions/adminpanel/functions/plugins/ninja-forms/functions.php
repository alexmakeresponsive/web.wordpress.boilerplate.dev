<?php

function theme_name_plugins_plugin_name_forms_admin_scripts($hook)
{
    $WP_Screen_current = get_current_screen();

    if ( $WP_Screen_current->id !== 'toplevel_page_plugin_name-forms'  ) {
        return;
    }

    wp_enqueue_style(
        'theme_name_plugins_plugin_name_forms_admin_style',
        get_template_directory_uri() . '/functions/adminpanel/functions/plugins/plugin_name-forms/css/style.css?r=7'
    );
}
add_action('admin_enqueue_scripts', 'theme_name_plugins_plugin_name_forms_admin_scripts');
