<?php

global $project;
$project_deposit          = plugin_get_the_post_meta($project->get_index_deposit_value());
$project_insurance        = plugin_get_the_post_meta($project->get_index_insurance_value());
$project_pay_status       = plugin_get_the_post_meta($project->get_index_pay_status_value());
$project_percents         = plugin_get_the_post_meta($project->get_index_percents_value());
$project_rcb              = plugin_get_the_post_meta($project->get_index_rcb_value());
$project_payment_type     = plugin_get_the_post_meta($project->get_index_payment_type_value());
$project_payment_systems  = plugin_get_the_post_meta($project->get_index_payment_systems_value());
$project_min              = plugin_get_the_post_meta($project->get_index_min_value());
$project_max              = plugin_get_the_post_meta($project->get_index_max_value());

$project_rating           = plugin_get_the_post_meta($project->get_index_rating_value());
$project_days_work        = plugin_get_the_post_meta($project->get_index_days_work_value());
$project_days_on_monitoring = plugin_get_the_post_meta($project->get_index_days_on_monitoring_value());
$project_pay_last_date    = plugin_get_the_post_meta($project->get_index_pay_last_date_value());
$project_link             = plugin_get_the_post_meta($project->get_index_link_value());

?>

<?php echo $project_days_work; ?>
