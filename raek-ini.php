<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

// Require Plugin Files
require_once(RAEK_PLUGIN_DIR . '/includes/plugin-functions.php');
require_once(RAEK_PLUGIN_DIR . '/includes/plugin-hooks.php');
require_once(RAEK_PLUGIN_DIR . '/includes/plugin-cron.php');
require_once(RAEK_PLUGIN_DIR . '/includes/plugin-settings.php');
require_once(RAEK_PLUGIN_DIR . '/includes/plugin-menu.php');
require_once(RAEK_PLUGIN_DIR . '/includes/plugin-assets.php');

// Add Plugin Menu Links
add_action('admin_menu', 'raek_plugin_menu');

// Register Plugin Settings
add_action('admin_init', 'raek_plugin_settings');

// Redirect User to Setup Plugin on Activation
add_action('admin_init', 'raek_activation_redirect');

// Require Plugin Pages
require_once(RAEK_PLUGIN_DIR . '/raek-pages.php');

// Require Widget Functions
require_once(RAEK_PLUGIN_DIR . '/raek-widgets.php');

?>
