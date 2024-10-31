<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

function raek_page_settings(){

?>
<div id="raek-plugin">
	<div class="container-fluid">

		<?php include_once('parts/raek-header.php'); ?>

		<div class="raek-body row">
			<div class="col-8">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo esc_url(admin_url('/admin.php?page=raek')); ?>">Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="<?php echo esc_url(admin_url('/admin.php?page=raek-settings')); ?>">Settings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo esc_url(admin_url('/admin.php?page=raek-help')); ?>">Help</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active">
						<p>Manage your RAEK Plugin settings, configurations and access credentials here.</p>
						<form action="<?php echo admin_url('admin-post.php'); ?>" method="post">
							<?php wp_nonce_field('raek_settings_update'); ?>
							<input type="hidden" name="action" value="raek_settings_update">
							<table class="form-table">
								<tr valign="top">
									<th scope="row">Version</th>
									<td><?php echo RAEK_VERSION; ?></td>
								</tr>

								<tr valign="top">
									<th scope="row">Your Website's Domain</th>
									<td><?php echo RAEK_DOMAIN; ?></td>
								</tr>

								<tr valign="top">
									<th scope="row">API Key</th>
									<td><input type="text" name="raek_api_key" placeholder="XXXXXXXXXXXXXXXXXXX" value="<?php echo esc_attr(get_option('raek_api_key')); ?>" /> <a href="https://app.raekdata.com/settings/installation/wordpress" target="_blank">Need a API Key?</a></td>
								</tr>
							</table>

							<div class="d-grid gap-2">
								<input class="btn btn-outline-raek" type="submit" value="Update Settings">
							</div>

						</form>
					</div>
				</div>
			</div>
			<div class="col-4">
				<?php include_once('parts/raek-sidebar.php'); ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>
