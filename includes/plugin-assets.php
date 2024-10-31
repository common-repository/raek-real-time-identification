<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

// Function loads admin dashboard assets such as CSS and JS
function raek_load_admin_assets($hook){

	// Load Assets On RAEK Plugin Pages
	if($hook === 'toplevel_page_raek' || strpos($hook, 'raek_page') !== false){
		// Load raek styles
		wp_register_style('raek-plugin-styles', RAEK_PLUGIN_URL . '/assets/css/raek-plugin-styles.css', array(), RAEK_VERSION);
		wp_enqueue_style('raek-plugin-styles');

		// Load raek script
		wp_register_script('raek-script', RAEK_PLUGIN_URL . '/assets/js/raek-plugin-script.js', array(), RAEK_VERSION);
		wp_enqueue_script('raek-script', array(), false, true);
	}
}
add_action('admin_enqueue_scripts', 'raek_load_admin_assets', 20, 1 );

// Function loads public facing assets such as CSS and JS
function raek_load_public_assets(){
	if(!current_user_can('administrator') && !current_user_can('editor')) {		
		wp_register_script('raek-network', add_query_arg( 'id', esc_attr(get_option('raek_api_key')), 'https://cdn.raek.net/js/raek.min.js' ), array(), false, array('in_footer' => true, 'strategy'  => 'async'));
		wp_enqueue_script('raek-network');

		// Load Raek Widget Styles, Coming Soon
		// wp_register_style('raek-plugin-styles', RAEK_PLUGIN_URL . '/assets/css/raek-plugin-styles.css');
		// wp_enqueue_style('raek-plugin-styles');
	} else {
		echo '<script>console.log("RAEK: Assets Suppressed Because User is Logged In As Admin");</script>';
	}
}
if(get_option('raek_plugin_activated') == true){
	add_action('wp_enqueue_scripts', 'raek_load_public_assets');
}

// Function Adds API Token to Script Tag when Loaded
function raek_script_token($tag, $handle, $src){
	if($handle == 'raek-network'){
		$tag = '<script type="text/javascript" src="' . esc_url( $src ) . '" data-package="WordPress ' . RAEK_VERSION . '" async></script>';
	}
	return $tag;
}
add_filter('script_loader_tag', 'raek_script_token', 10, 3);


?>