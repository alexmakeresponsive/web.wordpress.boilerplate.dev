<?php

function theme_name_taxonomy_type_rubric_for_project()
{
    register_taxonomy( theme_name_get_consts(array('taxonomy', 'rubric', 0)),
        array(
            theme_name_get_consts(array('post', 'pr'))
        ),
        array(

        )
    );
}
add_action( 'init', 'theme_name_taxonomy_type_rubric_for_project' );


function theme_name_taxonomy_type_tag_for_project()
{
    register_taxonomy(theme_name_get_consts(array('taxonomy', 'tag', 0)),
        array(
            theme_name_get_consts(array('post', 'pr'))
        ),
        array(

        )
    );
}
add_action( 'init', 'theme_name_taxonomy_type_tag_for_project' );
