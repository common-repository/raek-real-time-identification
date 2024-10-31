<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

// Create a Scheduled Event if one Does Not exist - Activate Cron
function raek_cron_activation() {
	if( !wp_next_scheduled( RAEK_CRON )){
	  wp_schedule_event( time(), 'daily', RAEK_CRON );
	}
}
add_action('wp', 'raek_cron_activation');

// Unschedule Scheduled Event - Deactivate RAEK Cron
function raek_cron_deactivate(){
	$timestamp = wp_next_scheduled( RAEK_CRON );
	wp_unschedule_event( $timestamp, RAEK_CRON );
}

// RAEK Cron Job Task
function raek_cron_task(){
	$currentDate = date('l F jS h:i:s A e');
	update_option('raek_cron_last_update', $currentDate);

	// Check RAEK Plugin Activation Status
	$raek_api_key = esc_attr(get_option('raek_api_key'));
	$raek_plugin_activated = esc_attr(boolval(get_option('raek_plugin_activated')));
	if($raek_plugin_activated === true){
		if(raek_check_activation_status($raek_api_key) === true){
			update_option('raek_plugin_activated', true);
		} else {
			update_option('raek_plugin_activated', false);
		}
	}
}
add_action( RAEK_CRON, 'raek_cron_task');

?>
