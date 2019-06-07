<?php

function theme_name_get_consts($const_name) {
    $consts = array(
        'global' => array(

        ),
        'users' => array(                                         //$l1
            'profile' => array(                                   //$l2
                'plugins' => array(                               //$l3
                    'plugin_name' => array(                     //$l4
                        'theme_name_cbr_users_profile_avatar'      //$l5
                    )
                )
            )
        ),
        'post' => array(
            'nw' => 'post_type_news',
            'pr' => 'post_type_projects'
        ),
        'post_meta' => array(
            'pr' => array(
                '_theme_name_cbr_post_pr_image_1',
                '_theme_name_cbr_post_pr_image_1_size_1',
                '_theme_name_cbr_post_pr_image_1_size_2',
            ),
            'nw' => array(
                '_theme_name_cbr_post_nw_image_1',
                '_theme_name_cbr_post_nw_image_1_size_1',
                '_theme_name_cbr_post_nw_image_2',
                '_theme_name_cbr_post_nw_image_2_size_1',
            ),
        ),
        'page' => array(
            'index' => array(
                'id' => 14
            ),
            'refbek' => array(
                'id' => 12
            ),
            'scam' => array(
                'id' => 358
            ),
            'about' => array(
                'id' => 8
            ),
            'reklama' => array(
                'id' => 21
            ),
            'contacts' => array(
                'id' => 25
            ),
            'news' => array(
                'id' => 23
            ),
            'form_builder_preview' => array(
                'id' => 514
            ),
            '404' => array(
                'id' => 518
            ),
            'reklama-request' => array(
                'id' => 622
            ),
        ),
        'taxonomy' => array(
            'rubric' => array(
                'rubric_for_project'
            ),
            'tag' => array(
                'tag_for_project'
            ),
        ),
        'plugins' => array(
            'acf' => array(

            )
        ),
        'fields' => array(                                      // $l1
            'via_plugins' => array(                             // $l2
                'plugin_name' => array(                       // $l3
                    'containers' => array(
                        'plugin_name_container.php',
                        'plugin_name_container_3.php',
                        'plugin_name_container_4.php',
                        'plugin_name_container_nbspbr.php',
                    ),
                    'page' => array(                            // $l4
                        'index' => array(                                   // $l5
                            'theme_name_cbr_page_index_banner',              // $l6
                            'theme_name_cbr_page_index_banner_link',
                            'theme_name_cbr_page_index_banner_image',

                            'theme_name_cbr_page_index_banner_2',
                            'theme_name_cbr_page_index_banner_2_link',
                            'theme_name_cbr_page_index_banner_2_image',
                        ),
                        'about' => array(
                            'theme_name_cbr_page_about_banners',
                            'theme_name_cbr_page_about_banners_link',
                            'theme_name_cbr_page_about_banners_image',
                        ),
                        'reklama' => array(
                            'theme_name_cbr_page_reklama_tarifs',            //
                            'theme_name_cbr_page_reklama_tarif_image',
                            'theme_name_cbr_page_reklama_tarif_title',
                            'theme_name_cbr_page_reklama_tarif_text',
                            'theme_name_cbr_page_reklama_tarif_price',
                            'theme_name_cbr_page_reklama_tarif_price_after', //5
                            'theme_name_cbr_page_reklama_title_2',           //6
                            'theme_name_cbr_page_reklama_title_3',           //7

                            'theme_name_cbr_page_reklama_table',             //8
                            'theme_name_cbr_page_reklama_table_title',
                            'theme_name_cbr_page_reklama_table_desc',

                            'theme_name_cbr_page_reklama_table_prices',      //11
                            'theme_name_cbr_page_reklama_table_prices_time',
                            'theme_name_cbr_page_reklama_table_prices_value',//13

                            'theme_name_cbr_page_reklama_banners',           //
                            'theme_name_cbr_page_reklama_banners_link',
                            'theme_name_cbr_page_reklama_banners_image',     //16

                            'theme_name_cbr_page_reklama_tarif_premium',
                        ),
                        'contacts' => array(
                            'theme_name_cbr_page_contacts_title_2',
                            'theme_name_cbr_page_contacts_title_3',

                            'theme_name_cbr_page_contacts_banners',
                            'theme_name_cbr_page_contacts_banners_link',
                            'theme_name_cbr_page_contacts_banners_image',

                            'theme_name_cbr_page_contacts_contacts',             //5
                            'theme_name_cbr_page_contacts_contacts_image',
                            'theme_name_cbr_page_contacts_contacts_text',
                            'theme_name_cbr_page_contacts_contacts_link',        //8

                            'theme_name_cbr_page_contacts_requisites',
                            'theme_name_cbr_page_contacts_requisites_image',
                            'theme_name_cbr_page_contacts_requisites_text',      //11
                        ),
                        'news' => array(
                            'theme_name_cbr_page_news_banners',
                            'theme_name_cbr_page_news_banners_link',
                            'theme_name_cbr_page_news_banners_image',

                            'theme_name_cbr_page_news_list_excerpt_length',
                            'theme_name_cbr_page_news_list_excerpt_end_text',

                            'theme_name_cbr_page_news_buttons_share_1',
                            'theme_name_cbr_page_news_buttons_share_1_code',

                            'theme_name_cbr_page_news_list_title_end_text',  //7
                        ),
                        'form_builder_preview' => array(
                            'theme_name_cbr_page_form_builder_preview_desc',
                        ),
                    ),
                    'post' => array(
                        'nw' => array(                          // $l5
                            'pagination_ajax_post_type_news_count_init',
                            'pagination_ajax_post_type_news_count_loaded',

                            'theme_name_cbr_post_nw_visit_page_count',
                            'theme_name_cbr_post_nw_image_1',

                            'theme_name_cbr_post_nw_banners',
                            'theme_name_cbr_post_nw_banners_link',
                            'theme_name_cbr_post_nw_banners_image',

                            'theme_name_cbr_post_nw_image_1_binding_1',
                            'theme_name_cbr_post_nw_image_2',
                        ),
                        'pr' => array(
                            'theme_name_cbr_post_pr_days_work',              //0     // $l6
                            'theme_name_cbr_post_pr_deposit',                //1     //Like as left sidebar

                            'theme_name_cbr_post_pr_image_1',                //2     //Logo

                            'theme_name_cbr_post_pr_forum',                  //3     //Forum fields
                            'theme_name_cbr_post_pr_forum_title',            //4
                            'theme_name_cbr_post_pr_forum_image',            //5
                            'theme_name_cbr_post_pr_forum_link',             //6

                            'theme_name_cbr_post_pr_days_on_monitoring',     //7
                            'theme_name_cbr_post_pr_our_deposit',            //8
                            'theme_name_cbr_post_pr_insurance',              //9
                            'theme_name_cbr_post_pr_payments',               //10
                            'theme_name_cbr_post_pr_min',                    //11
                            'theme_name_cbr_post_pr_max',                    //12
                            'theme_name_cbr_post_pr_last_payment',           //13

                            'theme_name_cbr_post_pr_rcb',                    //14
                            'theme_name_cbr_post_pr_percent_by_day',         //15
                            'theme_name_cbr_post_pr_status',         //16

                            'theme_name_cbr_post_pr_rating',         //17
                            'theme_name_cbr_post_pr_payments_values',               //18
                            'theme_name_cbr_post_pr_payments_desc',               //19

                            'pagination_ajax_posts_count_init',
                            'pagination_ajax_posts_count_loaded',

                            'theme_name_cbr_post_pr_link',                 //22
                        )
                    ),
                    'sidebar' => array(                                     // $l4
                        'left' => array(                                    // $l5
                            'theme_name_cbr_sidebar_left_banner_count',      // $l6
                            'theme_name_cbr_sidebar_left_banner_image',

                            'theme_name_cbr_sidebar_left_banners',
                            'theme_name_cbr_sidebar_left_banners_link',
                            'theme_name_cbr_sidebar_left_banners_image',
                        ),
                        'right' => array(
                            'theme_name_cbr_sidebar_right_banner_count',
                            'theme_name_cbr_sidebar_right_banner_image',

                            'theme_name_cbr_sidebar_right_banners',
                            'theme_name_cbr_sidebar_right_banners_link',
                            'theme_name_cbr_sidebar_right_banners_image',
                        )
                    ),
                    'parts' => array(
                        'common' => array(
                            'theme_name_cbr_parts_common_logo_1',
                            'theme_name_cbr_parts_common_logo_2',
                            'theme_name_cbr_parts_common_icon_mail',
                            'theme_name_cbr_parts_common_separator_1',
                            'theme_name_cbr_parts_common_separator_2',
                            'theme_name_cbr_parts_common_value_mail',                            //5
                            'theme_name_cbr_parts_common_separator_3',                           //6
                            'theme_name_cbr_parts_common_complex_social_lighgt_bg',              //7
                            'theme_name_cbr_parts_common_complex_social_lighgt_bg_link',         //
                            'theme_name_cbr_parts_common_complex_social_lighgt_bg_image',        //
                            'theme_name_cbr_parts_common_complex_social_dark_bg',                //10
                            'theme_name_cbr_parts_common_complex_social_dark_bg_link',           //11
                            'theme_name_cbr_parts_common_complex_social_dark_bg_image',          //12
                            'theme_name_cbr_parts_common_separator_4',                           //13
                            'theme_name_cbr_parts_common_icon_mail_dark_bg',                     //14

                            'theme_name_cbr_parts_common_banners',                              //15
                            'theme_name_cbr_parts_common_banners_link',                         //16
                            'theme_name_cbr_parts_common_banners_image',                        //17
                            'theme_name_cbr_parts_common_separator_5',                          //18
                        )
                    ),
                    'header' => array(
                        'theme_name_cbr_header_banner_1',
                        'theme_name_cbr_header_banner_1_link',
                    ),
                    'footer' => array(
                        'theme_name_cbr_footer_complex_text_1',
                        'theme_name_cbr_footer_complex_text_1_value',
                        'theme_name_cbr_footer_complex_text_2',
                        'theme_name_cbr_footer_complex_text_2_value',
                    ),
                )
            )
        ),
        'options' => array(
            'general' => array(
                'theme_name_custom_field_currency_type'
            )
        ),
        'uploads' => array(
            'image' => array(
                'suffix' => array(
                    '-150x150',
                    '-30x30',
                    '-64x64',
                    '-100x100',
                    '-210x210',
                )
            )
        ),
    );

    $l1 = isset( $const_name[0] ) ? $const_name[0] : null;
    $l2 = isset( $const_name[1] ) ? $const_name[1] : null;
    $l3 = isset( $const_name[2] ) ? $const_name[2] : null;
    $l4 = isset( $const_name[3] ) ? $const_name[3] : null;
    $l5 = isset( $const_name[4] ) ? $const_name[4] : null;
    $l6 = isset( $const_name[5] ) ? $const_name[5] : null;

    if ( isset( $const_name['data_export'] ) ) {
        return $consts;
    }

    switch (count($const_name)) {
        case 2:
            return $consts[$l1][$l2];
        case 3:
            return $consts[$l1][$l2][$l3];
        case 4:
            return $consts[$l1][$l2][$l3][$l4];
        case 5:
            return $consts[$l1][$l2][$l3][$l4][$l5];
        case 6:
            return $consts[$l1][$l2][$l3][$l4][$l5][$l6];
    }
}
