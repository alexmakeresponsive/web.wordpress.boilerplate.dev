<?php

function scripts()
{
    $paths = array(
        'styles' => array(
            //Vendor
            '_include_icons'        => '/design/vendor/icons/_include_icons.css?r=1',
            '_include_fonts'        => '/design/vendor/fonts/_include_fonts.css?r=1',
            'twitter_bootstrap_4'   => '/design/vendor/twitter-bootstrap/4/bootstrap.min.css?r=1',
            'jquery_nice_select_default'    => '/design/vendor/jquery/plugins/nice-select/css/nice-select.css?r=1',
            //Theme
            'theme_build'            => '/design/theme/styles/build.min.css?r=4',
            'theme_upd'              => '/design/theme/styles/upd-2019-03-18.css?r=20',
        )
    );

    foreach ($paths['styles'] as $style_name => $style_path) {
            wp_enqueue_style(
                $style_name,
                get_template_directory_uri() . $style_path
            );
    }
            //Vendor
            wp_enqueue_script(
                'vendor_jquery_nice_select',
                get_template_directory_uri() . '/design/vendor/package/jquery/plugins/plugin.min.js?r=2',
                array('jquery')
            );
            //Theme
            wp_enqueue_script(
                'jquery-plugin-script',
                get_template_directory_uri() . '/design/theme/js/jquery-plugin.js?r=11',
                array('jquery')
            );
            wp_enqueue_script(
                '/vendor-plugin-script',
                get_template_directory_uri() . '/design/theme/js/vendor-plugin.js?r=3',
                array('jquery')
            );
            wp_enqueue_script(
                'theme_pagination_ajax',
                get_template_directory_uri() . '/functions/pagination/ajax/script.js?r=8',
                array('jquery'),
                '1.0',
                false
            );
}
add_action( 'wp_enqueue_scripts', 'scripts' );
