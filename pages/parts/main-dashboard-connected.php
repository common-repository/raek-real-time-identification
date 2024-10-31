<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

?>
<div class="row my-2">
	<div class="col-4">Network Status</div>
	<div class="col-8">
		<span style="color: #009e00;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="height:1em; width:1em; vertical-align:text-top;"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg> Connected</span>
	</div>
</div>
<div class="row my-2">
	<div class="col-4">Last Status Check</div>
	<div class="col-8"><?php echo get_option('raek_cron_last_update'); ?></div>
</div>
<div class="row my-2">
	<div class="col-4">Next Status Check</div>
	<div class="col-8"><?php if( isset($raek_cron_scheduled) && !empty($raek_cron_scheduled) ){ echo date('l F jS h:i:s A e', $raek_cron_scheduled);} else { echo 'Not Scheduled'; } ?></div>
</div>
