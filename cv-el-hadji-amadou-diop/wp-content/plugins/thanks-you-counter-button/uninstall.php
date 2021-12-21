<?php
/* 
 * Thank You Counter Button plugin uninstall script
 * Author: vladimir@shinephp.com
 *
 */


if (!defined('ABSPATH') || !defined('WP_UNINSTALL_PLUGIN')) {
	 exit();  // silence is golden
}

require_once('thankyou_lib.php');

global $wpdb, $thanksCountersTable, $thanksPostReadersTable;

$query = "drop table $thanksCountersTable";
$wpdb->query($query);
if ($wpdb->last_error) {
   thanks_logEvent(THANKS_ERROR." during plugin uninstallation:\n"."Query: $query \n".$wpdb->last_error);
   return false;
}

$query = "drop table $thanksPostReadersTable";
$wpdb->query($query);
if ($wpdb->last_error) {
   thanks_logEvent(THANKS_ERROR." during plugin uninstallation:\n"."Query: $query \n".$wpdb->last_error);
   return false;
}

delete_option('thanks_db_version');
delete_option('thanks_display_page');
delete_option('thanks_display_home');
delete_option('thanks_not_display_for_categories');
delete_option('thanks_not_display_for_cat_list');
delete_option('thanks_position');
delete_option('thanks_position_before');
delete_option('thanks_position_after');
delete_option('thanks_position_firstpageonly');
delete_option('thanks_position_lastpageonly');
delete_option('thanks_position_shortcode');
delete_option('thanks_position_manual');
delete_option('thanks_style');
delete_option('thanks_caption_style');
delete_option('thanks_caption_color');
delete_option('thanks_size');
delete_option('thanks_color');
delete_option('thanks_custom');
delete_option('thanks_custom_url');
delete_option('thanks_custom_width');
delete_option('thanks_custom_height');
delete_option('thanks_check_ip_address');
delete_option('thanks_time_limit');
delete_option('thanks_time_limit_seconds');
delete_option('thanks_show_last_date');
delete_option('thanks_caption');
delete_option('thanks_dashboard_rows_number');
delete_option('thanks_dashboard_content');
delete_option('thanks_dashboard_statistics_link_show');
delete_option('thanks_dashboard_author_link_show');
delete_option('thanks_display_settings_shortcuts');


?>
