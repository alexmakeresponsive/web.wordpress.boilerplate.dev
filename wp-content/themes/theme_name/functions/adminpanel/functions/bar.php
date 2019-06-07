<?php

/**
 * Add custom markup for hover user info in admin bar
 */
function theme_name_admin_bar_user_avatar_setup()
{
	if ( get_option('show_avatars') ) {
			return;
	}

	global $wp_admin_bar;

  $user_id      = get_current_user_id();
  $current_user = wp_get_current_user();
  $profile_url  = get_edit_profile_url( $user_id );

	$user_avatar_src_origin = get_user_meta(
			$user_id,
			'_' . theme_name_get_consts(array('users', 'profile', 'plugins' , 'plugin_name', 0 )),
			true
	);
	$user_avatar_src_cut = theme_name_img_path_insert_suffix(
			$user_avatar_src_origin,
			theme_name_get_consts(array('uploads', 'image', 'suffix', 2))
	);

    $user_info  = '';
    $user_info .= '<div class="theme_name-admin-bar-user-info-wrapper">';
	if (!empty($user_avatar_src_origin)) {
	$user_info 		.= "<div class='theme_name-admin-bar-user-info-avatar-wrapper'>";
	$user_info 		.= "<img src='{$user_avatar_src_cut}' class='theme_name-admin-bar-user-info-avatar'>";
    $user_info 		.= "</div>";
	}
    $user_info 		.= '<div class="theme_name-admin-bar-user-info-text-wrapper">';
    $user_info 				.= "<span class='display-name  theme_name-admin-bar-user-info-display-name'>{$current_user->display_name}</span>";
  if ( $current_user->display_name !== $current_user->user_login ) {
    $user_info 				.= "<span class='username  theme_name-admin-bar-user-info-username'>{$current_user->user_login}</span>";
  }
    $user_info 		.= '</div>';
    $user_info .= '</div>';

  $wp_admin_bar->remove_menu('comments');
  $wp_admin_bar->remove_menu('updates');
  $wp_admin_bar->remove_menu('new-content');
  $wp_admin_bar->remove_menu('user-info');
  $wp_admin_bar->remove_menu('customize');

  $wp_admin_bar->add_menu(array(
  		'parent'  => 'user-actions',
  		'id'      => 'theme_name-user-info',
      'title'   => $user_info,
  		'href'    => $profile_url,
  		'meta'    => array(
  			   // 'html' => $user_info_avatar
  		),
	));
}
add_action( 'wp_before_admin_bar_render', 'theme_name_admin_bar_user_avatar_setup' );

/**
 * Add custom styles for admin bar
 */
function theme_name_admin_bar_user_avatar_setup_styles()
{
	if ( get_option('show_avatars') ) {
			return;
	}

  wp_enqueue_style(
      'theme_name-admin-bar-user-avatar-setup-styles',
      get_template_directory_uri() . '/functions/adminpanel/styles/users.css?r=22'
  );
}
add_filter('admin_init', 'theme_name_admin_bar_user_avatar_setup_styles');
add_filter('wp_loaded', 'theme_name_admin_bar_user_avatar_setup_styles');
