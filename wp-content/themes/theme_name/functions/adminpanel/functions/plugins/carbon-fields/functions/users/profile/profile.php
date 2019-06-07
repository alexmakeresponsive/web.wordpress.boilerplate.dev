<?php

/**
 * Wordpress avatar can be disabled in /wp-admin/options-discussion.php
 */

use plugin_name\Container;
use plugin_name\Field;

function crb_attach_users_profile()
{
    if ( get_option('show_avatars') ) {
  			return;
  	}

    Container::make( 'user_meta', 'Изображения' )
    ->add_fields( array(
        Field::make('image',
            theme_name_get_consts(array('users', 'profile', 'plugins' , 'plugin_name', 0 )),
            'Фото профиля'
        )->set_value_type('url')
         ->set_help_text('Загружайте изображение размером<br> не менее 300х300 пикселей'),
    ));
}
add_action( 'plugin_name_register_fields', 'crb_attach_users_profile' );


function theme_name_plugins_plugin_name_admin_users_profile_scripts($hook)
{
    $matches_hooks = array(
        'profile.php',
        'user-edit.php',
        'user-new.php',
    );
    $count_matches = 0;

    foreach ($matches_hooks as $matches_hook) {
        if ( $matches_hook === $hook ) {
            $count_matches++;
        }
    }

    if ( $count_matches === 0 ) {
        return;
    }

    wp_enqueue_style(
        'theme_name_plugin_name_admin_page_reklama',
        get_template_directory_uri() . '/functions/adminpanel/functions/plugins/plugin-name/functions/users/profile/style.css?r=2'
    );
}
add_action('admin_enqueue_scripts', 'theme_name_plugins_plugin_name_admin_users_profile_scripts');
