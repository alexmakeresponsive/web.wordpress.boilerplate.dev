<?php
/**
 * Created by PhpStorm.
 * User: aleksandrgorcakov
 * Date: 28.02.2019
 * Time: 18:41
 */

function theme_name_plugins_plugin_field_fix_bag_1_for_admin_pages($hook)
{
    $count_matches_name_pages = 0;
    $count_matches_screen_id  = 0;
    $count_matches_hook_post  = 0;
    $count_matches            = 0;
    $count_matches_hooks      = 0;

    $http_get_isset_page      = isset($_GET['page']) ? true : false;
    $http_get_isset_post      = isset($_GET['post']) ? true : false;
    $http_get_hook_is_post    = ( $hook === 'post.php' ) ? true : false;

    $matches_hooks = array(
        'profile.php',
        'user-edit.php',
        'user-new.php',
    );



    $WP_Screen_current        = get_current_screen();
    $WP_Screen_id_current     = $WP_Screen_current->id;

    $name_pages = array(

    );


    if (!empty($name_pages)) {
        foreach ($name_pages as $name) {
            if (!$http_get_isset_page) {
                break;
            }
            if( $name === $_GET['page'] ) {
                $count_matches_name_pages++;
            }
        }
    }

    if ( $WP_Screen_id_current === theme_name_get_consts(array('post','pr')) ) {
        $count_matches_screen_id++;
    }
    if ( $WP_Screen_id_current === theme_name_get_consts(array('post','nw')) ) {
        $count_matches_screen_id++;
    }

    if ( $http_get_hook_is_post ) {
        if ( $_GET['post']*1 === theme_name_get_consts(array('page','index','id')) ) {
            // $count_matches_hook_post++;
        }
        if ( $_GET['post']*1 === theme_name_get_consts(array('page','about','id')) ) {
            // $count_matches_hook_post++;
        }
        if ( $_GET['post']*1 === theme_name_get_consts(array('page','reklama','id')) ) {
            // $count_matches_hook_post++;
        }
        if ( $_GET['post']*1 === theme_name_get_consts(array('page','contacts','id')) ) {
            // $count_matches_hook_post++;
        }
        if ( $_GET['post']*1 === theme_name_get_consts(array('page','news','id')) ) {
            // $count_matches_hook_post++;
        }
    }


    foreach ($matches_hooks as $matches_hook) {
        if ( $matches_hook === $hook ) {
            $count_matches_hooks++;
        }
    }

    if ($count_matches_name_pages !== 0) {
        $count_matches++;
    }

    if ($count_matches_screen_id !== 0) {
        $count_matches++;
    }

    if ($count_matches_hook_post !== 0) {
        $count_matches++;
    }
    if ( $count_matches_hooks !== 0 ) {
        $count_matches++;
    }

    if ($count_matches === 0) {
        return;
    }

    wp_enqueue_script(
        'theme_name_plugin_field_fix_bag_1_script',
        get_template_directory_uri() . '/functions/plugins/plugin-fields/script.js?r=33',
        false,
        '1.0',
        true
    );
    wp_enqueue_style(
        'theme_name_plugin_field_fix_bag_1_style',
        get_template_directory_uri() . '/functions/plugins/plugin-fields/style.css?r=14'
    );
}
add_action('admin_enqueue_scripts', 'theme_name_plugins_plugin_field_fix_bag_1_for_admin_pages');
