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
					<h5 class="card-title text-center">RAEK's Traffic Identification Plugin</h5>
					<p class="card-text">The RAEK WordPress Plugin is a utility to provide tools for companies and sites wanting to improve their lead collections efficiency. Maximize your sales & marketing efforts by gaining insights into your Anonymous Web Traffic. The RAEK Network identifies and builds profiles on Non-Converting Website Visitors.</p>
					<p class="card-text">This plugin is a quick and easy way to implement RAEK's Traffic Identification Script. By providing direct integrated access to RAEK's Network, your existing traffic will be monitored and interactions logged into the Network in attempt to identify the visitor.</p>
					<?php

					include(RAEK_PLUGIN_DIR . '/includes/plugin-notices.php');

					?>

					<form action="<?php echo admin_url('admin-post.php'); ?>" method="post">
						<?php wp_nonce_field('raek_agreement_activation'); ?>
						<input type="hidden" name="action" value="raek_agreement_activation">

						<div class="mb-3 form-check">
							<input class="form-check-input" type="checkbox" name="raek-agreement" required>
							<label class="form-check-label">By checking this box and clicking below, you agree to our <a href="https://www.raekdata.com/legal/policies/tos" target="_blank">terms of service</a> and <a href="https://www.raekdata.com/legal/policies/privacy" target="_blank">privacy policy</a>.</label>
						</div>

						<div class="d-grid gap-2">
							<input class="btn btn-outline-raek" type="submit" value="I Agree to the Terms and Conditions">
						</div>
					</form>
				</div>
      </div>
    </div>
  </div>
</div>
