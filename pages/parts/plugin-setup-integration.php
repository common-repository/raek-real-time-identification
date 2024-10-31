<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

?>
<div id="raek-plugin">
	<div class="container-fluid p-3">
		<div class="row justify-content-center">
			<div class="col-4 text-center p-3">
				<img class="img-fluid" src="<?php echo RAEK_PLUGIN_URL . '/assets/images/raek-logo-tm-alt.png'; ?>" alt="RAEK">
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-8 card">
				<div class="card-body">
					<h5 class="card-title text-center">Activate RAEK Network Integration</h5>

					<?php

					include(RAEK_PLUGIN_DIR . '/includes/plugin-notices.php');

					?>

					<p class="card-text">In order to Activate the RAEK Plugin you need an API key to access RAEK's Network. Login into your RAEK Account or Register a New Account to access your API key. RAEK is Free for everyone to use, and offers some pro features for those who want more from RAEK.</p>

					<p class="card-text">Click here to <a href="https://app.raekdata.com/settings/installation" target="_blank">Login to the RAEK Dashboard</a> to get your API Key, or click here to <a href="https://app.raekdata.com/register" target="_blank">Register A New Account</a>. Once you're in the dashboard you will find your API Key on the <b>Domain Setup</b> page located under <b>Domain Settings</b>.</p>

					<p class="card-text">Registering a new site with RAEK: Be sure to add in the fully qualified domain name for your website when registering your site with RAEK. Be sure to include the subdomain such as www.yourcompany.com or example.yourcompany.com if it exists and exclude it if it does not.</p>

					<p class="card-text"><b>Your Domain</b>: <?php echo RAEK_DOMAIN; ?></p>

					<form action="<?php echo admin_url('admin-post.php'); ?>" method="post">
						<?php wp_nonce_field('raek_api_activation'); ?>
						<input type="hidden" name="action" value="raek_api_activation">

						<div class="mb-3">
							<label class="form-label">RAEK API Key</label>
							<input class="form-control" type="text" name="raek_api_key" value="<?php echo esc_attr(get_option('raek_api_key')); ?>" required>
						</div>

						<div class="d-grid gap-2">
							<input class="btn btn-outline-raek" type="submit" value="Activate RAEK Plugin">
						</div>

						<div class="text-end fs-6 pt-2">
							<a href="https://support.raekdata.com/hc/en-us/articles/4410656157203" target="_blank">Help <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/></svg></a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
