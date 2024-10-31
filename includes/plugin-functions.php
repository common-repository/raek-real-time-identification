<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

// Function Used When Plugin First Activates, Redirects User to Plugin Page For Setup
function raek_activation_redirect(){
	if(get_option('raek_activation_redirect', false)){
		delete_option('raek_activation_redirect');

		if(!isset($_GET['activate-multi'])){
			wp_redirect(esc_url(admin_url('/admin.php?page=raek')));
		}
	}
}

// Function Used When User Accepts the Raek Agreement on Plugin Setup Page
function raek_agreement_activation(){
	$retrieved_nonce = $_REQUEST['_wpnonce'];
	if (!wp_verify_nonce($retrieved_nonce, 'raek_agreement_activation' ) ){
		die( 'Failed security check' );
	} else {
		update_option('raek_plugin_agreement', true);
		wp_redirect(esc_url(admin_url('/admin.php?page=raek')));
	}
}
add_action( 'admin_post_raek_agreement_activation', 'raek_agreement_activation' );

// Function Used When User First Submits their API key From their RAEK Account Dashboard
function raek_api_activation(){
	$retrieved_nonce = $_REQUEST['_wpnonce'];
	$raek_api_key = sanitize_text_field( trim($_POST['raek_api_key']) );

	if (!wp_verify_nonce($retrieved_nonce, 'raek_api_activation' ) ){
		die( 'Failed security check' );
	} else {

		// Check if valid API key
		if(raek_check_activation_status($raek_api_key) === true){
			// Raek Setup Complete
			update_option('raek_api_key', $raek_api_key);
			update_option('raek_plugin_setup', true);

			// Raek Can Be Activated
			update_option('raek_plugin_activated', true);
		} else {
			//update_option('raek_error', 'Invalid API Key');
		}

		wp_redirect(esc_url(admin_url('/admin.php?page=raek')));
	}
}
add_action('admin_post_raek_api_activation', 'raek_api_activation');

// Function Used to check the activation status of the plugin, called by RAEK_CRON
function raek_check_activation_status($raek_api_key){
	$raek_customer_domain = RAEK_DOMAIN;

	if(isset($raek_customer_domain) && !empty($raek_customer_domain) && isset($raek_api_key) && !empty($raek_api_key)){
		$raek_endpoint = 'https://api.raek.net/v1.2.4/site/authenticate';

		$postData['domain'] = $raek_customer_domain;
		$postData['token'] = $raek_api_key;
		$postData['wordpress'] = RAEK_VERSION;

		$raekJSON = [
			'raekJSON'  => json_encode($postData)
		];

		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$domainName = $_SERVER['HTTP_HOST'];
		$referer = $protocol.$domainName;

		$args = array(
			'body'        => $raekJSON,
			'timeout'     => '5',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => array('Referer' => $referer),
			'cookies'     => array(),
		);



		$response = wp_remote_post($raek_endpoint, $args);

		if(isset($response["body"]) && is_string($response["body"])){
			$json_response = json_decode($response["body"], true);
		} else {
			$json_response = $response["body"];
		}

		// If there is an Error from the API
		if(isset($json_response['status']['type']) && $json_response['status']['type'] === 'error'){
				if($json_response['status']['code'] == '100'){
					update_option('raek_error', 'Error: ' . $json_response['status']['message'] . '<br>Incorrect API Key For This Domain.');
					return false;
				} else {
					update_option('raek_error', 'Error: ' . $json_response['status']['message']);
					return false;
				}
		} else {
				// If the API Returns the Site is Active and Ready
				if(isset($json_response['site']['status']) && $json_response['site']['status'] === 'active'){
					return true;
				} else {
					// If an Error Message Was Returned From the API
					if(isset($json_response['status']['message']) && !empty($json_response['status']['message'])){
						update_option('raek_error', 'Error: ' . $json_response['status']['message']);
						return false;
					} else {
						update_option('raek_error', 'Error: Something happened while authenticating.<div>' . $response["body"] . '</div>');
						return false;
					}

				}
		}
	} else {
		update_option('raek_error', 'Missing Domain or API Key');
    	return false;
	}
}

// Function Used When User Submits Updated Settings
function raek_settings_update(){
	$retrieved_nonce = $_REQUEST['_wpnonce'];
	if (!wp_verify_nonce($retrieved_nonce, 'raek_settings_update' ) ){
		die( 'Failed security check' );
	} else {

		if(isset($_POST['raek_api_key']) && !empty($_POST['raek_api_key'])){
			$raek_api_key = sanitize_text_field( trim($_POST['raek_api_key']) );

			if(raek_check_activation_status($raek_api_key) === true){
				update_option('raek_api_key', $raek_api_key);
				update_option('raek_plugin_activated', true);
			} else {
				update_option('raek_plugin_activated', false);
			}
		}

		wp_redirect(esc_url(admin_url('/admin.php?page=raek-settings')));
	}
}
add_action('admin_post_raek_settings_update', 'raek_settings_update');

// Function to add RAEK Widget to the WP Admin Dashboard
function raek_add_dashboard_widgets(){
  wp_add_dashboard_widget(
    'raek_dashboard_widget',
    esc_html__('RAEK Overview'),
    'raek_dashboard_widget'
  );
}
add_action('wp_dashboard_setup', 'raek_add_dashboard_widgets');

// Function Adds Plugin Review Prompt
function raek_notice_plugin_review(){
	if (!isset($_GET['raek_nonce']) || !wp_verify_nonce($_GET['raek_nonce'], 'raek_function_something')) {

		?>
		<div class="notice notice-info">
			<div style="display:inline-block; width:100%; vertical-align:middle;">
				<div style="display:inline-block; width:5%; padding:13px 26px; overflow:hidden; vertical-align:middle; box-sizing:content-box;">
					<img style="width:100%;" src="<?php echo RAEK_PLUGIN_URL . '/assets/images/raek-icon.png'; ?>">
				</div>
				<div style="display:inline-block; width:60%; overflow:hidden; vertical-align:middle;">
					<h3 style="margin:0;">How do you like RAEK?</h3>
					<p>You've been using RAEK for a while now! We would appreciate&nbsp;your feedback and support as we continue to develop new methods of increasing online sales and conversion. Please take a minute and <a href="https://wordpress.org/support/plugin/raek-real-time-identification/reviews/#new-post" target="_blank">Write a Review</a> with your feedback.</p>
				</div>
				<div style="display:inline-block; width:25%; overflow:hidden; vertical-align:middle; text-align:right;">
					<div>
						<a class="button button-primary btn-raek" href="https://wordpress.org/support/plugin/raek-real-time-identification/reviews/#new-post" target="_blank">Leave Feedback!</a>
					</div>
					<a class="d-block" href="<?php echo wp_nonce_url(home_url($_SERVER['REQUEST_URI']), 'raek_function_something', 'raek_nonce');?>"><small>Maybe Later</small></a>
				</div>
			</div>
		</div>
		<?php

	} else {
		// Silence RAEK Review Prompt
		update_option('raek_plugin_review_prompt_dnd', true);
		$_SESSION['raek_plugin_review_dnd_delay'] = true;
	}
}

// If Raek Is Activated & One Week Has Passed Prompt for Review
// If Dismissed Once, Wait Four Weeks to ask again
$raek_plugin_activated = boolval(get_option('raek_plugin_activated'));
$raek_plugin_activation_date = get_option('raek_plugin_activation_date');
$raek_plugin_review_prompt_dnd = boolval(get_option('raek_plugin_review_prompt_dnd'));

// If plugin is activated
if(isset($raek_plugin_activated) && $raek_plugin_activated == true){
	// If plugin was activated 4 days ago
	if(isset($raek_plugin_activation_date) && $raek_plugin_activation_date !== false && strtotime($raek_plugin_activation_date) <= strtotime('-4 days')){
		// If review prompt is not set to DND
		if(!isset($raek_plugin_review_prompt_dnd) || $raek_plugin_review_prompt_dnd == false){
			// Show Review Notification
			add_action('admin_notices', 'raek_notice_plugin_review');
		}
	} else{
		if(!isset($raek_plugin_activation_date) || empty($raek_plugin_activation_date)){
			// Update Activation Date Because it was not set
			update_option('raek_plugin_activation_date', date('l F jS h:i:s A e'));
		}
	}
}

?>
