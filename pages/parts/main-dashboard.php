<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

?>
<div id="raek-plugin">
	<div class="container-fluid">

		<?php include_once('raek-header.php'); ?>

		<div class="raek-body row">
			<div class="col-8">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" href="<?php echo esc_url(admin_url('/admin.php?page=raek')); ?>">Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo esc_url(admin_url('/admin.php?page=raek-settings')); ?>">Settings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo esc_url(admin_url('/admin.php?page=raek-help')); ?>">Help</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active">
						<?php

						if(boolval(get_option('raek_plugin_activated')) === true){
							require_once('main-dashboard-connected.php');
						} else {
							require_once('main-dashboard-disconnected.php');
						}

						?>
					</div>
				</div>
			</div>
			<div class="col-4">
				<?php include_once('raek-sidebar.php'); ?>
			</div>
		</div>
	</div>
</div>
