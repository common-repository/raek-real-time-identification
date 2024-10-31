<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

$raek_plugin_agreement = get_option('raek_plugin_agreement');

if($raek_plugin_agreement == false){

	require_once('plugin-setup-agreement.php');

}
if($raek_plugin_agreement == true){

	require_once('plugin-setup-integration.php');

}

?>
