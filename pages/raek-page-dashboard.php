<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

function raek_page_dashboard(){
	$raek_cron_scheduled = wp_next_scheduled( RAEK_CRON );
	$raek_plugin_setup = get_option('raek_plugin_setup');

	if($raek_plugin_setup == true){

		require_once('parts/main-dashboard.php');

	} else {

		require_once('parts/plugin-setup.php');

	}
}

?>
