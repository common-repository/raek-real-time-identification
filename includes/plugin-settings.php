<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

//register our settings and initiate plugin
function raek_plugin_settings(){
	// Raek API Key, Required for Raek To Load and Run
	register_setting('raek-plugin-settings', 'raek_api_key');

	// Raek Error Response, Used throughout the Plugin
	register_setting('raek-plugin-settings', 'raek_error');

	// Raek Activation Redirect Variable, Used When Plugin First Activates
	register_setting('raek-plugin-settings', 'raek_activation_redirect');

	// Raek Cron datetime, Updated Every time the Cron Runs
	register_setting('raek-plugin-settings', 'raek_cron_last_update');

	// Raek Plugin Activation Varible, Used to check if the Raek JS should be loaded
	register_setting('raek-plugin-settings', 'raek_plugin_activated');

	// Raek Plugin Activation Date Varible, Used to check when to prompt for review
	register_setting('raek-plugin-settings', 'raek_plugin_activation_date');

	// Raek Plugin Review DND Varible, Used to check if Review Notification was Silenced
	register_setting('raek-plugin-settings', 'raek_plugin_review_prompt_dnd');

	// Raek Plugin Setup Varible, Used to check if the user has completed plugin setup steps
	register_setting('raek-plugin-settings', 'raek_plugin_setup');

	// Raek Plugin Agreement Variable, used to check if the user has accepted the Raek Terms and Conditions
	register_setting('raek-plugin-settings', 'raek_plugin_agreement');
}

?>
