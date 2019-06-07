<?php

function my_plugin_name_submit_data( $form_data )
{
    session_start();

    $captch_input_id     = $_SESSION['plugin']['plugin-name']['captha_input_id'];
    $captch_value_server = $_SESSION['plugin']['plugin-name']['captha_value'];

    $captch_value_client = intval($form_data['fields'][ $captch_input_id ]['value']);


    if( $captch_value_server !== $captch_value_client ) { // Add check here.
        $errors      =  array(
            'fields' => array(
                $captch_input_id => 'Неправильный код',
            ),
        );
        $response    =  array(
            'errors'        => $errors,
        );

        header('Content-Type: application/json');
        echo wp_json_encode( $response );
        wp_die();
    }

    return $form_data;
}
add_filter( 'plugin_name_submit_data', 'my_plugin_name_submit_data' );
