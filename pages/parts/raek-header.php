<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

?>
<!-- RAEK Plugin Pages Header -->
<div class="raek-header row d-flex align-items-center">
	<div class="col-2">
		<img class="img-fluid" src="<?php echo RAEK_PLUGIN_URL . '/assets/images/raek-logo-tm.png'; ?>" alt="RAEK">
	</div>
	<div class="col-8">
	</div>
</div>
<div id="raek-admin-notices-wrapper">
	<!-- WP appends notices to the first H1 or H2 tag, so this is here to capture admin notices. -->
	<h1 id="raek-admin-notices" style="display: none;">Empty Header For Notices</h1>
	<hr class="wp-header-end">
	<?php include(RAEK_PLUGIN_DIR . '/includes/plugin-notices.php'); ?>
</div>
