<?php

/**
 * Add option to: Настройки - Общие
 */
function theme_name_admin_general_options_custom_fields()
{
    $option_name = theme_name_get_consts(array('options', 'general', 0 ));

    register_setting('general', $option_name, 'esc_attr');
    add_settings_field(
        $option_name,
        '<label for="' . $option_name . '">'.__('Символ валюты' , $option_name ).'</label>' ,
        'theme_name_admin_general_options_custom_fields_currency_type_html',
        'general'
    );
}
function theme_name_admin_general_options_custom_fields_currency_type_html()
{
    $option_name  = theme_name_get_consts(array('options', 'general', 0 ));
    $option_value = get_option( $option_name, '' );
    echo '<input type="text" id="my_field" name="' . $option_name . '" value="' . $option_value . '" />';
}
add_filter('admin_init', 'theme_name_admin_general_options_custom_fields');
