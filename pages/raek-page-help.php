<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

function raek_page_help(){

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
						<a class="nav-link" href="<?php echo esc_url(admin_url('/admin.php?page=raek-settings')); ?>">Settings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="<?php echo esc_url(admin_url('/admin.php?page=raek-help')); ?>">Help</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active">
						<h4>RAEK Plugin Help</h4>
						<p>RAEK's WordPress Plugin is a powerful tool to help optimize your lead generation efforts. After successfully activating the plugin with your API key from a free or premium account, RAEK begins tracking and analyzing your web traffic to identify any profiles and adding them to your RAEK account dashboard.</p>
						<p>For more information on RAEK's WordPress plugin setup and installation, please review our <a href="https://support.raekdata.com/hc/en-us/articles/4410656157203" target="_blank">WordPress Documentation</a>.</p>
						<p>Need additional support? You can create a <a href="https://support.raekdata.com/hc/en-us/requests/new" target="_blank">Support Ticket here</a>. Please include your website domain name in the request.</p>
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
