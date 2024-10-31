<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

// Activation Function
function raek_activate(){
	// Set Option For Initial Redirect
	add_option('raek_activation_redirect', true);
}
register_activation_hook( RAEK_PLUGIN, 'raek_activate');

// Deactivation Function
function raek_deactivation(){
	raek_cron_deactivate();
}
register_deactivation_hook( RAEK_PLUGIN, 'raek_deactivation' );

// Uninstall Function
function raek_uninstall(){

}
register_uninstall_hook( RAEK_PLUGIN, 'raek_uninstall' );

?>
