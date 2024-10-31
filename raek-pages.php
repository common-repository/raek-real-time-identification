<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

include_once('pages/raek-page-dashboard.php');

// If Initial Plugin Setup Is Not Complete Limit Pages
$raek_plugin_setup = get_option('raek_plugin_setup');
if($raek_plugin_setup == true){
	include_once('pages/raek-page-settings.php');
	include_once('pages/raek-page-help.php');
}

?>
